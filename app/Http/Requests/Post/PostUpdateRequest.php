<?php

namespace App\Http\Requests\Post;

use App\Models\Post;

class PostUpdateRequest extends PostRequest
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
            'unit_code' => "required",
            'unit_title' => "required",
            'title' => "required",
            'description' => "required",
        ];
    }

    public function update(Post $post)
    {
        $post->unit_code = $this->unit_code;
        $post->unit_title = $this->unit_title;
        $post->title = $this->title;
        $post->description = $this->description;

        if (substr($post->thumbnail, 0, 4) !== 'http') {
            if ($post->thumbnail) {
                $this->deleteImage($post);
            }

            if ($this->thumbnail != '') {
                $this->thumbnail = $this->saveImage($post->title, $this->thumbnail);
            }

            $post->thumbnail = $this->thumbnail;
        }

        $post->save();
    }
}
