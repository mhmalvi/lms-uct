<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use App\Services\ImageHandler;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    protected function saveImage($title, $image)
    {
        $image_handler = new ImageHandler();

        $image_name = time() . '_' . Str::slug($title);

        $image_name = $image_handler->setImage($image)
            ->setName($image_name)
            ->setPath('posts')
            ->storeFromImageData();

        return $image_name;
    }

    protected function deleteImage(Post $post)
    {
        Storage::delete("public/posts/{$post->thumbnail}");
    }
}
