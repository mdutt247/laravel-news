<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'comment_id' => $this->id,
            'comment' => $this->comment,
            'author' => new UserResource($this->whenLoaded('author')),
            'post' => new PostResource($this->whenLoaded('post')),
        ];
    }
}
