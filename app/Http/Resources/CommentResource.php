<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\Boolean;

class CommentResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'user'=>$this->user->name,
            'reply'=>new ReplyResource($this->whenLoaded('reply')),
            'has_like'=>(Boolean)$this->hasLike,
            'likes_count'=>$this->likes->count(),
            'dislikes_count'=>$this->dislikes->count(),
        ];
    }
}
