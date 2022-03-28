<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Course;

class CourseRequest extends FormRequest
{
    /**
     * retrive course category id
     */
    protected function category()
    {
        return Category::where('uuid', $this->category)->first()->id;
    }

    /**
     * retrive file extension from base64 string
     */
    private function getOrigianlFileExtension($file)
    {
        $encodedImgString = explode(',', $file, 2)[1];
        $decodedImgString = base64_decode($encodedImgString);
        $info = getimagesizefromstring($decodedImgString);

        $ext = image_type_to_extension($info[2]);

        return $ext;
    }

    /**
     * Make directory if not exist
     */
    private function makeDirectory()
    {
        if (!Storage::exists("public/courses")) {
            Storage::makeDirectory("public/courses");
            Storage::makeDirectory("public/courses/thumbnails");
        }
    }

    /**
     * store product thumbanil
     * base64 encoded
     */
    protected function storeThumbnailImages()
    {
        $file = $this->thumbnail;
        $name = $this->image_title ? Str::slug($this->image_title) : Str::slug($this->title);
        $extension = $this->getOrigianlFileExtension($file);
        $filename = "{$name}{$extension}";

        $this->makeDirectory();

        Image::make($file)
            ->fit(1080, 720)
            ->save(storage_path('app/public/courses/' . $filename));

        Image::make($file)
            ->fit(430, 168)
            ->save(storage_path('app/public/courses/thumbnails/' . $filename));

        return $filename;
    }

    protected function deleteImages(Course $course)
    {
        Storage::delete('public/course/' . $course->thumbnail);
        Storage::delete('public/course/thumbnails/' . $course->thumbnail);
    }
}
