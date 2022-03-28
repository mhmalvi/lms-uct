<?php

namespace App\Http\Requests;

use App\Models\Course;
use App\Models\Classroom;
use App\Services\ImageHandler;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class CreateClassroomRequest extends FormRequest
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
            'title' => 'required',
            'section' => 'required',
            'course' => 'required',
        ];
    }

    public function save()
    {
        $course = Course::where('uuid', $this->course)->first();
        $slug = Str::slug($this->title);
        $cover_photo_filename = null;

        if ($this->filled('cover_photo')) {
            $image_handler = new ImageHandler();
            $cover_photo_filename = time() . '_' . $slug;
            $cover_photo_filename = $image_handler->setDimension(800, 600)
                ->setImage($this->cover_photo)
                ->setName($cover_photo_filename)
                ->setPath('classrooms')
                ->storeFromImageData();
        }

        return Classroom::create([
            'unique_id' => Str::random(8),
            'title' => $this->title,
            'slug' => $slug,
            'section' => $this->section,
            'course_id' => $course->id,
            'cover_photo' => $cover_photo_filename,
        ]);
    }
}
