<?php

namespace App\Http\Requests\Admin;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseUpdateRequest extends CourseRequest
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
        $course = Course::where('uuid', $this->uuid)->firstOrFail();
        return [
            'code' => "required|unique:courses,code," . $course->id,
            'title' => "required",
        ];
    }

    public function update(Course $course)
    {
        $course->title = $this->title;
        $course->code = $this->code;
        $course->slug = Str::slug($this->title);
        $course->category_id = $this->category ? $this->category() : null;
        $course->description = $this->description;
        if (strlen($this->thumbnail) > 0 && substr($this->thumbnail, 0, 4) != "http") {
            $this->deleteImages($course);
            $course->thumbnail = $this->storeThumbnailImages();
        } else if (strlen($this->thumbnail) == 0 && strlen($course->thumbnail) > 0) {

            $this->deleteImages($course);
        }

        $course->publish = $this->draft ? 0 : 1;

        $course->save();
        return $course;
    }
}
