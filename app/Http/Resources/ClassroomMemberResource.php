<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomMemberResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user->uuid,
            'user' => new UserResource($this->user),
            'classroom_id' => $this->classroom_id,
            'classroom' => new ClassroomResource($this->classroom),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
