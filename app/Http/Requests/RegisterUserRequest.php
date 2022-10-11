<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
        'email'=>'required|email|unique:users,email',
        'password'=>'required| min:7| max:14',
        'email'=>'required',
        // 'gender' => 'in:male,female',
        'date_of_birth'=>'required',
        'date_of_joining'=>'required',
        'image'=>'required',
        'address'=>'required',
        'designation'=>'required',
        'salary'=>'required',
        'phone_number'=>'required',
        'emergency_contact_name'=>'required',
        'emergency_phone_number'=>'required',
    ];
    }
}
