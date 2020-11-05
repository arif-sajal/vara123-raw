<?php

namespace App\Http\Requests\Administration\Property\Spot;

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
            'name' => 'required|unique:property_spots,name,'.$this->route()->id,
            'total' => 'required',
            'available' => 'required',
            'booked' => 'required',
            'provider' => 'required' 
        ];
    }
}
