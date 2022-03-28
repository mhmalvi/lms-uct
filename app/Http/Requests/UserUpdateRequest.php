<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $user = User::where('uuid', $this->uuid)->first();
        return [
            'username' => "required|unique:users,name,{$user->id}",
            'email' => "required|unique:users,email,{$user->id}",
        ];
    }

    public function update(User $user)
    {
        $user->name = $this->username;
        $user->email = $this->email;
        $user->save();
    }
}
