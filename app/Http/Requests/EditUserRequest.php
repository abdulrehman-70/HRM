<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class EditUserRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required', 'unique:users,email,'.$this->id,
            // 'gender' => 'in:male,female',
            'date_of_birth'=>'required|before:today',
            'date_of_joining'=>'required',
            'image'=>'mimes:jpeg,png,jpg|max:2048',
            // 'image'=>'required',

            'address'=>'required',
            'designation'=>'required|exists:designations,name',
            'salary'=>'required|numeric',
            'phone_number'=>'required|string',
            'emergency_contact_name'=>'required|string',
            'emergency_phone_number'=>'required|string',
        ];
    }
}
