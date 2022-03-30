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
        ];
    }

    public function save()
    {
        $post = new Post();

        $post->title = $this->title;
        $post->description = $this->description;

        if ($this->thumbnail) {
            $image_handler = new ImageHandler();

            $image_name = time() . '_' . Str::slug($this->title);

            $image_name = $image_handler->setImage($this->thumbnail)
                ->setName($image_name)
                ->setPath('posts')
                ->storeFromImageData();

            $post->thumbnail = $image_name;
        }

        $post->save();
    }
}
