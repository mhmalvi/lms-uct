<?php

namespace App\Http\Requests\Course;

use App\Models\Category;

class CategoryDeleteRequest extends CategoryRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    public function delete(Category $category)
    {
        $this->deleteThumbnail($category->thumbnail);

        $category->delete();
    }
}
