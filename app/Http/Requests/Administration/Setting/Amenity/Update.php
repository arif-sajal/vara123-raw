<?php

namespace App\Http\Requests\Administration\Setting\Amenity;

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
            'name' => 'required|unique:amenities,name,'. $this->route()->id,
            'icon' => 'required',
            'property_type_id' => 'required',
            'provider_id' => 'required',
        ];
    }
}
