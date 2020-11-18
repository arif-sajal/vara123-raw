<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Library\Notify\Facades\Notify;
use App\Http\Requests\Administration\Setting\VehicleType\Add;
use App\Http\Requests\Administration\Setting\VehicleType\Update;

class VehicleTypeController extends Controller
{
    public function vehicleTypesListView(){
        return view('administration.tabs.setting.vehicleTypeListView');
    }

    public function vehicleTypesTable(){
        $vehicleTypes = VehicleType::query();

        return DataTables::make($vehicleTypes->latest()->get())
          ->rawColumns(['icon', 'action'])
            ->addColumn('action',function(VehicleTYpe $vehicleTypes){
                return "
                    <button class='btn btn-sm btn-info' data-content='"
                    .route('app.modal.setting.vehicle.type.edit',$vehicleTypes->id)."
                    ' data-hover='tooltip' data-original-title='Edit Vehicle Type'data-toggle='modal'
                    data-target='#myModal'><i class='la la-pencil'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.modal.setting.vehicle.type.delete',$vehicleTypes->id)."' data-hover='tooltip'
                    data-original-title='Delete Vehicle Type'><i class='la la-trash'></i></button>
                ";
            })
            ->editColumn('icon',function($vehicleTypes){
                if(Storage::has($vehicleTypes->icon)):
                    return "<img src='".Storage::url($vehicleTypes->icon)."' class='img-fluid' style='width:32px' alt='error.png'/>";
                else:
                    return "Icon Not Uploaded";
                endif;
            })
            ->toJson();
    }

    public function viewSettingVehicleTypeModal(){
        return view('administration.modals.setting-vehicle-type.add');
    }

    public function addVehicleType(Add $request){
        $VehicleType = new VehicleType();
        $VehicleType->name = $request->name;

        if( $request->icon ):
            $VehicleType->icon = Storage::putFile('icon', $request->file('icon'));
        endif;

        if( $VehicleType->save()):
            return Notify::send('success','Vehicle Type added successfully')->reload('table','VehicleTypesTable')->json();
        endif;
        return Notify::send('warning','Data didn\'t insert')->json();
    }

    public function editVehicleTypeModal($id){
        $vehicleTypes = VehicleType::find($id);
        return view('administration.modals.setting-vehicle-type.edit',compact('vehicleTypes'));
    }

    public function updateVehicleType(Update $request, $id){
        $vehicleTypeUpdate = VehicleType::find($id);
        $vehicleTypeUpdate->name = $request->name;

        if( $request->icon ):
          if(Storage::exists($vehicleTypeUpdate->icon)):
            Storage::delete($vehicleTypeUpdate->icon);
          endif;
            $vehicleTypeUpdate->icon = Storage::putFile('icon', $request->file('icon'));
        endif;

        if( $vehicleTypeUpdate->save() ) :
            return Notify::send('success','Vehicle Type updated successfully')->reload('table','VehicleTypesTable')->json();
        endif;
      return Notify::send('warning','Vehicle Type Didn\'t update')->json();
    }

    public function deleteVehicleType($id){
        $vehicleTypeDelete = VehicleType::find($id);
          if(Storage::exists($vehicleTypeDelete->icon)):
            Storage::delete($vehicleTypeDelete->icon);
          endif;

          if( $vehicleTypeDelete->delete() ) :
              return Notify::send('success','Vehicle Type Deleted successfully')->reload('table','VehicleTypesTable')->json();
          endif;
    }
}
