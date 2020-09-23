<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Models\VehicleManufacturer;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

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
                    .route('app.booking.view',$vehicleManufacturer->id)."
                        ' data-hover='tooltip' data-original-title='View Room'><i class='la la-pencil'></i></button>

                        <button class='btn btn-sm btn-danger' data-action='confirm' data-action-route='".
                    route('app.booking.delete',$vehicleManufacturer->id)."' data-hover='tooltip'
                        data-original-title='Delete Room'><i class='la la-trash'></i></button>
                    ";
            })
            ->toJson();
    }
}
