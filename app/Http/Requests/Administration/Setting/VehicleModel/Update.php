<?php

namespace App\Http\Requests\Administration\Setting\VehicleModel;

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
            'manufacturer_id' => 'required',
            'vehicle_type_id' => 'required',
            'model_name' => 'required',
            'model_year' => 'required'
        ];
    }
}
