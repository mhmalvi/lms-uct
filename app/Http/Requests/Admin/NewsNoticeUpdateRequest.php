<?php

namespace App\Http\Requests\Admin;

use App\Models\NewsNotice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsNoticeUpdateRequest extends NewsNoticeRequest
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
            'slug' => 'required|unique:news_notices,slug,' . $this->id,
            'post_type' => 'required',
        ];
    }

    public function update(NewsNotice $news_notice)
    {
        $news_notice->title = $this->title;
        $news_notice->description = $this->description;
        $news_notice->slug = $this->filled('slug') ? $this->slug : Str::slug($this->title);

        // when user updated the image
        if (strlen($this->image) > 3 && substr($this->image, 0, 4) != 'http') {
            // delete current image from filesystem
            $this->deleteExistingImage($news_notice->image);
            // save new image
            $news_notice->image = $this->saveImage();
        }
        // when user removed the existing image
        else if (strlen($this->image) == 0 && strlen($news_notice->image) > 0) {
            // delete current image from filesystem
            $this->deleteExistingImage($news_notice->image);
            // reset image data in database
            $news_notice->image = null;
        }

        $news_notice->post_type = $this->post_type;
        $news_notice->is_published = $this->is_published;
        $news_notice->save();
        return $news_notice;
    }
}
