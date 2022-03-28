<?php

namespace App\Http\Resources;

use App\Models\Classroom;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $classroom = Classroom::find($this->classroom_id);

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'author' => new UserResource($this->author),
            'classroom_id' => $classroom->unique_id,
            'description' => $this->description,
            'attachments' => $this->attachments,
            'created_at' => $this->getCreatedTime(),
        ];
    }

    private function getCreatedTime()
    {
        $created_time = strtotime($this->created_at);

        if ((time() - $created_time) > (60 * 60 * 24)) {
            return $this->created_at->format('d M, Y');
        } else {
            return $this->created_at->diffForHumans();
        }
    }
}
