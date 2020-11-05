<?php

namespace App\Http\Requests\Administration\Property\Vehicle;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vehicle_model'=>'required|',
            'description'=>'required',
            'featured_image'=>'nullable|image',
            'total'=>'required',
            'price.*'=>'required',
        ];
    }
}
