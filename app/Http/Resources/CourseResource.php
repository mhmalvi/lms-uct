<?php

namespace App\Http\Resources;

use App\Http\Resources\Course\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'uuid' => $this->uuid,
            'code' => $this->code,
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category ? new CategoryResource($this->category) : '',
            'thumbnail' => $this->thumbnail_url,
            'image' => $this->image_url,
            'description' => $this->description,
            'publish' => $this->publish,
            'publish_status' => $this->publish ? "Published" : "Draft",
            'created_at' => $this->created_at->format('d M, Y'),
        ];
    }
}
