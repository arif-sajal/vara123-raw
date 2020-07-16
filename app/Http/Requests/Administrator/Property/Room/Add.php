<?php

namespace App\Http\Requests\Administrator\Property\Room;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'room_type'=>[Rule::in(['Single','Double','Queen','King'])],
            'description'=>'required',
            'featured_image'=>'required|image',
            'total'=>'required',
            'beds'=>'array',
            'beds.*.bed_type'=>[Rule::in(['Single','Double','Queen','King'])],
            'beds.*.for_person'=>'required|integer',
            'price.*'=>'required',
        ];
    }

    public function forPersonCount(){
        $beds = collect($this->get('beds'));
        return $beds->sum('for_person');
    }
}
