<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleModel;
use App\Models\VehicleType;
use App\Models\VehicleManufacturer;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Setting\VehicleModel\Add;
use App\Http\Requests\Administration\Setting\VehicleModel\Update;
use Illuminate\Support\Facades\File;
use Library\Notify\Facades\Notify;

class VehicleModelController extends Controller
{
    public function vehicleModelsListView(){
        return view('administration.tabs.setting.vehicleModelList');
    }

    public function vehicleModelsTable(){

        $vehicleModel = VehicleModel::query();
            return DataTables::make($vehicleModel->latest()->get())
                  ->rawColumns(['image', 'action'])
                  ->editColumn('image',function(VehicleModel $vehicleModel){
            if(Storage::has($vehicleModel->image)):
                return "<img src='".Storage::url($vehicleModel->image)."' alt='{$vehicleModel->image}'/>";
            else:
                return "Logo Not Uploaded";
            endif;
        })
        ->addColumn('action',function(VehicleModel $vehicleModel){
            return "
                    <button class='btn btn-sm btn-success'data-content='"
                .route('app.modal.setting-vehicle-model-modal.view',$vehicleModel->id)."'data-hover='tooltip'
                      data-original-title='Quick View' data-toggle='modal' data-target='#myModal'>
                      <i class='la la-eye'></i></button>

                    <button class='btn btn-sm btn-info' data-content='"
                .route('app.modal.setting-vehicle-model-modal.edit',$vehicleModel->id)."
                    ' data-hover='tooltip' data-original-title='Edit Vehicle Model'data-target='#myModal'
                    data-toggle='modal'><i class='la la-pencil'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='"
                .route('app.form.submission.setting-vehicle-model.delete',$vehicleModel->id)."' data-hover='tooltip'
                    data-original-title='Delete Vehicle Model'><i class='la la-trash'></i></button>
                ";
        })
        ->toJson();
    }

    public function addSettingVehicleModelModal(){
      $manufacturers = VehicleManufacturer::all();
      $types = VehicleType::all();
      return view('administration.modals.setting-vehicle-model.add',compact('manufacturers','types'));
    }

    public function addVehicleModel(Add $request){
      $vehicleModel = new VehicleModel();
      $vehicleModel->manufacturer_id = $request->manufacturer_id;
      $vehicleModel->vehicle_type_id = $request->vehicle_type_id;
      $vehicleModel->model_name = $request->model_name;
      $vehicleModel->model_year = $request->model_year;
      $vehicleModel->height = $request->height;
      $vehicleModel->width = $request->width;
      $vehicleModel->length = $request->length;
      $vehicleModel->mileage = $request->mileage;
      $vehicleModel->transmission = $request->transmission;
      $vehicleModel->fuel_type = $request->fuel_type;
      $vehicleModel->door_count = $request->door_count;

      if($request->has('image')):
        $vehicleModel->image = Storage::putFile('model/image',$request->file('image'));
      endif;

      if($vehicleModel->save()):
          return Notify::send('success','Vehicle Model added successfully')->reload('table','VehicleModelsTable')->json();
      endif;
        return Notify::send('warning','Data didn\'t insert')->json();
    }

    public function viewSettingVehicleModelModal(VehicleModel $vehicleModels){
          return view('administration.modals.setting-vehicle-model.view',compact('vehicleModels'));
    }

    public function editVehicleModelModal(VehicleModel $vehicleModels){
          $manufacturers = VehicleManufacturer::all();
          $types = VehicleType::all();
          return view('administration.modals.setting-vehicle-model.edit',compact('vehicleModels','manufacturers','types'));
    }

    public function updateVehicleModel(Update $request,$id){
      $vehicleModelUpdate = VehicleModel::find($id);
      $vehicleModelUpdate->manufacturer_id = $request->manufacturer_id;
      $vehicleModelUpdate->vehicle_type_id = $request->vehicle_type_id;
      $vehicleModelUpdate->model_name = $request->model_name;
      $vehicleModelUpdate->model_year = $request->model_year;
      $vehicleModelUpdate->height = $request->height;
      $vehicleModelUpdate->width = $request->width;
      $vehicleModelUpdate->length = $request->length;
      $vehicleModelUpdate->mileage = $request->mileage;
      $vehicleModelUpdate->transmission = $request->transmission;
      $vehicleModelUpdate->fuel_type = $request->fuel_type;
      $vehicleModelUpdate->door_count = $request->door_count;

      if( $request->image ):
        if(Storage::exists($vehicleModelUpdate->image)):
          Storage::delete($vehicleModelUpdate->image);
        endif;
          $vehicleModelUpdate->image = Storage::putFile('model/image', $request->file('image'));
      endif;

      if( $vehicleModelUpdate->save() ) :
          return Notify::send('success','Vehicle Model updated successfully')->reload('table','VehicleModelsTable')->json();
      endif;
    return Notify::send('warning','Vehicle Model Didn\'t update')->json();
    }

    public function deleteVehicleModel($id){
        $vehicleModelDelete = VehicleModel::find($id);
        if(Storage::exists($vehicleModelDelete->image)):
          Storage::delete($vehicleModelDelete->image);
        endif;

        if( $vehicleModelDelete->delete() ) :
            return Notify::send('success','Vehicle Model Deleted successfully')->reload('table','VehicleModelsTable')->json();
        endif;
    }
}
