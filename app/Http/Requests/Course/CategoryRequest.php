<?php

namespace App\Http\Requests\Course;

use App\Services\ImageHandler;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class CategoryRequest extends FormRequest
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

    public function storeThumbnail($name)
    {
        $image_handler = new ImageHandler();
        return $image_handler->setImage($this->thumbnail)
            ->setName($name)
            ->setPath('categories')
            ->setDimension(80, 80)
            ->storeFromImageData();
    }

    public function deleteThumbnail($image_name)
    {
        Storage::delete('public/categories/' . $image_name);
    }
}
