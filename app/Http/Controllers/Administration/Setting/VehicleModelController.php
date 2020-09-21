<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{
    public function vehicleModelsListView(){
        return view('administration.tabs.setting.vehicleModelList');
    }
}
