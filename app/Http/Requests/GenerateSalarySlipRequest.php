<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateSalarySlipRequest extends FormRequest
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
            'incentive'=> 'numeric',
            'house_rent'=> 'numeric',
            'provident_fund'=> 'numeric',
            'professional_text'=> 'numeric',
            'loan'=> 'numeric',
            'user'=>'required'
        ];
    }
}
