<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public $tabs = [
        ['name'=>'Vehicle Type','route'=>'vehicle.type','icon'=>'la-bank'],
        ['name'=>'Vehicle Manufacturer','route'=>'vehicle.manufacturer','icon'=>'la-bank'],
        ['name'=>'Vehicle Model','route'=>'vehicle.model','icon'=>'la-bank'],
    ];

    public function settingView(){
        return view('administration.pages.setting.view')->with('tabs', $this->tabs);
    }
}
