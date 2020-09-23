<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use Yajra\DataTables\Facades\DataTables;

class VehicleTypeController extends Controller
{
    public function vehicleTypesListView(){
        return view('administration.tabs.setting.vehicleTypeListView');
    }

    public function vehicleTypesTable(){
        $vehicleTypes = VehicleType::query();

        return DataTables::make($vehicleTypes->latest()->get())
            ->addColumn('action',function(VehicleTYpe $vehicleTypes){
                return "
                    <button class='btn btn-sm btn-info' data-content='"
                    .route('app.booking.view',$vehicleTypes->id)."
                    ' data-hover='tooltip' data-original-title='View Room'><i class='la la-pencil'></i></button>

                    <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.booking.delete',$vehicleTypes->id)."' data-hover='tooltip'
                    data-original-title='Delete Room'><i class='la la-trash'></i></button>
                ";
            })
            ->toJson();
    }
}
