<?php

namespace App\Http\Requests\Administration\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfile extends FormRequest
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
            'first_name' =>'required',
            'last_name' =>'required',
            'phone'=>'unique:admins,phone,'.$this->route()->id,
            'email' =>'required|unique:admins,email,'.$this->route()->id,
            'username' =>'required|unique:admins,username,'.$this->route()->id,
        ];
    }
}
