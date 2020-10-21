<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Models\VehicleManufacturer;
use App\Models\VehicleType;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Administration\Setting\VehicleManufacturer\Add;
use App\Http\Requests\Administration\Setting\VehicleManufacturer\Update;
use Illuminate\Support\Facades\File;
use Library\Notify\Facades\Notify;

class VehicleManufacturerController extends Controller
{
    public function vehicleManufacturersListView(){
        return view('administration.tabs.setting.vehicleManufacturerList');
    }

    public function vehicleManufacturersTable(){
        $vehicleManufacturer = VehicleManufacturer::query();

        return DataTables::make($vehicleManufacturer->latest()->get())
            ->rawColumns(['logo', 'action'])
            ->editColumn('logo',function(VehicleManufacturer $vehicleManufacturer){
                if(Storage::has($vehicleManufacturer->logo)):
                    return "<img src='".Storage::url($vehicleManufacturer->logo)."' alt='{$vehicleManufacturer->name}'/>";
                else:
                    return "Logo Not Uploaded";
                endif;
            })
            ->addColumn('action',function(VehicleManufacturer $vehicleManufacturer){
                return "
                        <button class='btn btn-sm btn-info' data-content='"
                    .route('app.modal.setting-vehicle-manufacturer-modal.edit',$vehicleManufacturer->id)."
                        ' data-hover='tooltip' data-original-title='Edit Manufacturer'data-target='#myModal'
                        data-toggle='modal'><i class='la la-pencil'></i></button>

                        <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.form.submission.setting-vehicle-manufacturer.delete',$vehicleManufacturer->id)."' data-hover='tooltip'
                        data-original-title='Delete Manufacturer'><i class='la la-trash'></i></button>
                    ";
            })
            ->toJson();
    }

    public function viewSettingVehicleManufacturerModal(){
      $countries = Country::all();
      return view('administration.modals.setting-vehicle-manufacturer.add',compact('countries'));
    }

    public function addVehicleManufacturer(Add $request){
        $vehicleManufacturer = new VehicleManufacturer();
        $vehicleManufacturer->country_id = $request->country_id;
        $vehicleManufacturer->name = $request->name;

        if($request->has('logo')):
          $vehicleManufacturer->logo = Storage::putFile('manufacturer/logo',$request->file('logo'));
        endif;

        if($vehicleManufacturer->save()):
            return Notify::send('success','Vehicle Manufacturer added successfully')->reload('table','VehicleManufacturerTable')->json();
        endif;
          return Notify::send('warning','Data didn\'t insert')->json();
    }

    public function editVehicleManufacturerModal(VehicleManufacturer $vehicleManufacturers){
        $countries = Country::all();
        return view('administration.modals.setting-vehicle-manufacturer.edit',compact('countries','vehicleManufacturers'));
    }

    public function updateVehicleManufacturer(Update $request, $id){
      $vehicleManufacturerUpdate = VehicleManufacturer::find($id);
      $vehicleManufacturerUpdate->name = $request->name;
      $vehicleManufacturerUpdate->country_id = $request->country_id;

      if( $request->logo ):
        if(Storage::exists($vehicleManufacturerUpdate->logo)):
          Storage::delete($vehicleManufacturerUpdate->logo);
        endif;
          $vehicleManufacturerUpdate->logo = Storage::putFile('manufacturer/logo', $request->file('logo'));
      endif;

      if( $vehicleManufacturerUpdate->save() ) :
          return Notify::send('success','Vehicle Manufacturer updated successfully')->reload('table','VehicleManufacturerTable')->json();
      endif;
    return Notify::send('warning','Vehicle Manufacturer Didn\'t update')->json();
    }

    public function deleteVehicleManufacturer($id){

      $vehicleManufacturerDelete = VehicleManufacturer::find($id);
        if(Storage::exists($vehicleManufacturerDelete->logo)):
          Storage::delete($vehicleManufacturerDelete->logo);
        endif;

        if( $vehicleManufacturerDelete->delete() ) :
            return Notify::send('success','Vehicle Manufacturer Deleted successfully')->reload('table','VehicleManufacturerTable')->json();
        endif;
    }
}
