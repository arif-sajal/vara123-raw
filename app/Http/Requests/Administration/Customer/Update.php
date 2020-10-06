<?php

namespace App\Http\Requests\Administration\Customer;

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
            'first_name'   => 'required',
            'last_name' => 'required',
            'address'  => 'required',
            'country' => 'required',
            'state' => 'required',
            'city'  => 'required',
            'p_code' => 'required',
            'email'=> 'required|unique:customers,email,'.$this->route()->id,
            'phone'  => 'unique:customers,phone,'.$this->route()->id,
            'nid_number'  => 'unique:customers,nid_number,'.$this->route()->id,
            'passport_number'=> 'unique:customers,passport_number,'.$this->route()->id,
            'birth_certificate_number' => 'unique:customers,birth_certificate_number,'.$this->route()->id,
            'username' => 'required|unique:customers,username,'.$this->route()->id,
        ];
    }
}
