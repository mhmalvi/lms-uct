<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
            "name" => "required",
            "selected_course" => "required",
            "givenName" => "required",
            "sureName" => "required",
            "phone" => "required",
            "mobile" => "required",
            "email" => "required",
            "gender" => "required"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'this field is required',
            'selected_course.required' => 'this field is required',
            'givenName.required' => 'this field is required',
            'sureName.required' => 'this field is required',
            'phone.required' => 'this field is required',
            'mobile.required' => 'this field is required',
            'email.required' => 'this field is required',
            'gender.required' => 'this field is required',
        ];
    }
}
