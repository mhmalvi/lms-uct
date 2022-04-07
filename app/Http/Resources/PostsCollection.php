<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($res) {
            return [
                'id' => $res->id,
                'unit_code' => $res->unit_code,
                'unit_title' => $res->unit_title,
                'title' => $res->title,
                'description' => $res->description,
                'thumbnail_url' => $res->thumbnail_url,
                'created_at' => $res->created_at->diffForHumans(),
            ];
        });
    }
}
