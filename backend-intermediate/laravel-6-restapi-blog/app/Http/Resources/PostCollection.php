<?php

namespace App\Http\Resources;

use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data" => PostResource::collection($this->collection),
            "meta" => [
                "total_data" => $this->collection->count()
            ]
        ];
    }
}
