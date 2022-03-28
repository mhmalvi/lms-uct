<?php

namespace App\Http\Requests\Admin;

use App\Models\NewsNotice;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class NewsNoticeDeleteRequest extends FormRequest
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
        return [];
    }

    public function delete(NewsNotice $news_notice)
    {
        if ($news_notice->image) {
            Storage::delete('public/news_notices/' . $news_notice->image);
        }
        $news_notice->delete();
    }
}
