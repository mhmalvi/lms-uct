<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiveClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $now_timestamp = time();

        return [
            'topic' => 'required|max:220',
            'start_time_timestamp' => 'required|numeric|min:' . $now_timestamp,
            'duration' => 'required|integer|min:1',
            'password' => 'required|max:10|alpha_num',
        ];
    }

    public function messages()
    {
        return [
            'start_time_timestamp.required' => "The start time field is required.",
            'start_time_timestamp.min' => "The start time can't be in past",
        ];
    }
}
