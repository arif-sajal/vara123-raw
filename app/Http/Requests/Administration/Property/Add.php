<?php

namespace App\Http\Requests\Administration\Property;

use Illuminate\Foundation\Http\FormRequest;

class Add extends FormRequest
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
            'property_type'=>'required|exists:property_types,id',
            'name'=>'required|unique:properties,name,',
            'description'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'amenities'=>'required|array',
            'city'=>'required|exists:cities,id',
            'address'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'featured_image'=>'required|image',
        ];
    }
}
