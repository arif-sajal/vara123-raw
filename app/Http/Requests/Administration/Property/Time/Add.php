<?php

namespace App\Http\Requests\Administration\Property\Time;

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
            'day_name' => 'required|unique:timings,day_name,'. $this->route()->id,
            'day_number' => 'required',
            'opening' => 'required',
            'closing' => 'required',
            'is_off_day' => 'required'
        ];
    }
}
