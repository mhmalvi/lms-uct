<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'unique_id' => $this->unique_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'section' => $this->section,
            'course' => new CourseResource($this->course),
            'students_count' => $this->members->filter(function ($member) {
                return $member->user->user_type == 'student';
            })->count(),
            'cover_photo' => $this->cover_photo ? asset('storage/classrooms/' . $this->cover_photo) : null,
        ];
    }
}
