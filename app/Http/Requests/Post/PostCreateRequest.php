<?php

namespace App\Http\Requests\Post;

use App\Models\Post;
use App\Services\ImageHandler;
use Illuminate\Support\Str;

class PostCreateRequest extends PostRequest
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
            'title' => "required",
            'description' => "required",
            'thumbnail' => "required",
        ];
    }

    public function save()
    {
        $post = new Post();

        $post->title = $this->title;
        $post->description = $this->description;
        $image_handler = new ImageHandler();
        $image = $image_handler->setImage($this->thumbnail)
            ->setName(Str::slug($this->title))
            ->setPath('posts')
            ->storeFromImageData();

        $post->thumbnail = $image;

        $post->save();
    }
}
