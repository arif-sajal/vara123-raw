<?php

namespace App\Http\Requests\Administration\Property;

use Illuminate\Foundation\Http\FormRequest;

class Edit extends FormRequest
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
            'name'=>'required|unique:properties,name,'.$this->route()->id,
            'description'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'city'=>'required|exists:cities,id',
            'address'=>'required',
            'lat'=>'required',
            'lng'=>'required',
            'featured_image'=>'nullable',
        ];
    }
}
