<?php

namespace App\Http\Requests\Admin;

use Illuminate\Support\Str;
use App\Services\ImageHandler;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class NewsNoticeRequest extends FormRequest
{
    protected function deleteExistingImage($image_name)
    {
        Storage::delete('public/news_notices/' . $image_name);
    }

    protected function saveImage()
    {
        $image_name = $this->slug;
        $image_handler = new ImageHandler();
        $image_handler->setName($image_name)
            ->setImage($this->image)
            ->setDimension(822, 480)
            ->setPath('news_notices');

        return $image_handler->storeFromImageData();
    }
}
