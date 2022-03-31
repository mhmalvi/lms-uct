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
            'unit_code' => "required",
            'unit_title' => "required",
            'title' => "required",
            'description' => "required",
        ];
    }

    public function save()
    {
        $post = new Post();

        $post->unit_code = $this->unit_code;
        $post->unit_title = $this->unit_title;
        $post->title = $this->title;
        $post->description = $this->description;

        if ($this->thumbnail) {
            $post->thumbnail = $this->saveImage($this->title, $this->thumbnail);
        }

        $post->save();
    }
}
