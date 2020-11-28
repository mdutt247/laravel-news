<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'post_id' => $this->id,
            'post_title' => $this->title,
            'post_content' => $this->content,
            'post_type' => $this->post_type,
            'post_meta' => $this->meta_data,
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y'),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'videos' => VideoResource::collection($this->whenLoaded('videos')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'author' => new UserResource($this->whenLoaded('author')),
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
