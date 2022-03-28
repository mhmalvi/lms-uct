<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username' => $this->name,
            'email' => $this->email,
            'user_type' => $this->user_type,
            'avatar' => $this->avatar_url,
            'info' => new UserInfoResource($this->info),
            'created_at' => $this->created_at->format('d M, Y'),
        ];
    }
}
