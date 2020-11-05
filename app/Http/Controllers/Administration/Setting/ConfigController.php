<?php

namespace App\Http\Controllers\Administration\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Administration\Config\Update;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Library\Notify\Facades\Notify;
use Yajra\DataTables\Facades\DataTables;

class ConfigController extends Controller
{
    public function config_list()
    {
        $configs = Config::all();
        return view('administration.tabs.setting.config', compact('configs'));
    }

    public function view_add_modal()
    {
        return view('administration.modals.config.add');
    }

    public function edit_config_modal($id)
    {
        $config = Config::find($id);
        return view('administration.modals.config.edit', compact('config'));
    }

    public function update_config(Update $request)
    {

        $configs = Config::where("type", "!=", "file")->get();

        foreach ($request['value'] as $Key => $value):
            $configs[$Key]->value = $value;
            $configs[$Key]->save();
        endforeach;

        if ($request->image):
            $config = Config::where("type", "file")->first();
            if (Storage::exists($config->value)) :
                Storage::delete($config->value);
            endif;
            $config->value = Storage::putFile('system', $request->image);
            $config->save();
        endif;

        return Notify::send("success", "Information updated")->json();
    }
}
