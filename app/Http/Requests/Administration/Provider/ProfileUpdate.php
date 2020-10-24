<?php

namespace App\Http\Requests\Administration\Provider;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdate extends FormRequest
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
            'first_name'=> 'required',
            'last_name' => 'required',
            'user_type' => 'required',
            'email' => 'required|unique:providers,email,'.$this->route()->id,
            'username'=> 'required|unique:providers,username,'.$this->route()->id,
            'phone'  => 'unique:providers,phone,'.$this->route()->id,
        ];
    }
}
