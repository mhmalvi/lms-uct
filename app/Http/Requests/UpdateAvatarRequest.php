<?php

namespace App\Http\Requests;

use App\Services\ImageHandler;
use Illuminate\Support\Facades\Storage;

class UpdateAvatarRequest extends AvatarRequest
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
            'avatar' => 'required',
        ];
    }

    public function update($user)
    {
        if ($user->avatar) {
            $this->deletePreviousAvatar();
        }
        $image_name = time() . '_' . $user->name;
        $image_handler = new ImageHandler();
        $image_handler->setImage($this->avatar)
            ->setPath('avatars')
            ->setName($image_name)
            ->setDimension(200, 200);
        $image_name = $image_handler->storeFromImageData();

        $user->update([
            'avatar' => $image_name
        ]);
        return $image_name;
    }
}
