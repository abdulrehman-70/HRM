<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewFormRequest extends FormRequest
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
        'candidate_name'=>'required',
        'employer_name'=>'required',
        'candidate_email'=>'required|email',
        'employer_email'=>'required|email',
        'date'=>'required',
        'designation_id'=>'required',
        'interview_type'=>'required',
        'interview_status_id'=>'required',
        ];
    }
}
