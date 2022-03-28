<?php

namespace App\Http\Requests\Admin;

use App\Models\NewsNotice;

class NewsNoticeCreateRequest extends NewsNoticeRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
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
            'slug' => 'required|unique:news_notices',
            'post_type' => 'required',
        ];
    }

    public function save()
    {
        return NewsNotice::create([
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->filled('image') ? $this->saveImage() : null,
            'post_type' => $this->post_type,
            'is_published' => $this->is_published
        ]);
    }
}
