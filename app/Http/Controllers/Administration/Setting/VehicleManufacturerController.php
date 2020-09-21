<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleManufacturerController extends Controller
{
    public function vehicleManufacturersListView(){
        return view('administration.tabs.setting.vehicleManufacturerList');
    }
}
