<?php

namespace App\Http\Requests\Administration\Setting\VehicleType;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
