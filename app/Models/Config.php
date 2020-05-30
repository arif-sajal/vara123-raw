<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public function format(){
        if($this->attributes['type'] == 'relation'):
            return $this->attributes['related']::find($this->attributes['value']);
        endif;
        return $this->attributes['value'];
    }
}
