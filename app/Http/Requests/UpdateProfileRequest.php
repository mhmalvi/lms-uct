<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check() || auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'max:255',
            'last_name' => 'max:255'
        ];
    }

    public function update($user)
    {
        $user->info->first_name = $this->first_name;
        $user->info->last_name = $this->last_name;
        $user->info->contact = $this->contact;
        $user->info->address = $this->address;
        $user->info->about = $this->bio;

        $user->push();
    }
}
