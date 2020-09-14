<?php

namespace Library\Configs;

use App\Models\Config;
use Illuminate\Support\Arr;
use Library\Notify\Facades\Notify;

class Configs
{
    protected $configs;

    public function __construct(){
        $this->configs = $this->__load();
    }

    public function update($key,$value){
        $config = Config::where('key',$key)->first();
        if($config):
            $config->value = $value;
            if($config->save()):
                return Notify::send('success','_UPDATED_')->array();
            else:
               return Notify::send('error','CANT_UPDATE')->array();
            endif;
        else:
            return Notify::send('error','_NOT_FOUND_')->array();
        endif;
    }

    public function get($key){
        $config = collect($this->configs)->filter(function($item)use($key){
            return $item->key == $key;
        })->first();
        if($config->type == 'object'):
            return json_decode($config->value);
        elseif($config->type == 'boolean'):
            return $config->value == "on" ? true : false ;
        else:
            return $config->value;
        endif;
    }

    public function refresh(){
        $configs = Config::all();
        $this->__setToSession($configs);
    }

    private function __load(){
        if(session()->has('config')):
            $configs = session()->get('config');
        else:
            $configs = Config::all();
            $this->__setToSession($configs);
        endif;
        return $configs;
    }

    private function __setToSession($configs){
        session()->forget('config');
        session()->put('config',$configs);
    }
}
