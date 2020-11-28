<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
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
            'video_id' => $this->id,
            'title' => $this->title,
            'post_id' => $this->post_id,
            'url' => $this->url
        ];
    }
}
