<?php

namespace App\Http\Requests;

class DeleteAvatarRequest extends AvatarRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    public function delete($user)
    {
        if ($user->avatar) {
            $this->deletePreviousAvatar();
        }

        $user->update([
            'avatar' => null,
        ]);
    }
}
