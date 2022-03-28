<?php

namespace App\Http\Requests\Course;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryCreateRequest extends CategoryRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // slug the slug again, because user can input any kind of text in slug
        $this->slug = Str::slug($this->slug);
        return [
            'title' => 'required',
            'slug' => 'required|unique:categories',
        ];
    }

    public function save()
    {
        $image_name = null;
        if ($this->filled('thumbnail')) {
            $image_name = $this->storeThumbnail($this->slug);
        }

        return Category::create([
            'uuid' => Str::uuid(),
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->filled('description') ? $this->description : null,
            'thumbnail' => $image_name,
        ]);
    }
}
