<?php

namespace App\Http\Requests\Course;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryUpdateRequest extends CategoryRequest
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
            'slug' => 'required|unique:categories,slug,' . $this->id,
        ];
    }

    public function update(Category $category)
    {
        $category->title = $this->title;
        $category->slug = $this->slug;
        $category->description = $this->description;

        if (strlen($this->thumbnail) == 0 && strlen($category->thumbnail) > 0) {
            $this->deleteThumbnail($category->thumbnail);
            $category->thumbnail = '';
        } else if (strlen($this->thumbnail) > 0 && substr($this->thumbnail, 0, 4) != 'http') {
            $this->deleteThumbnail($category->thumbnail);
            $image_name = $this->storeThumbnail($category->slug);
            $category->thumbnail = $image_name;
        }

        $category->save();

        return $category;
    }
}
