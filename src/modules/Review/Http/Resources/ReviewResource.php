<?php

namespace Modules\Review\Http\Resources;

use Modules\Review\Models\Review;
use App\Http\Resources\BaseJsonResource;
use Modules\User\Http\Resources\UserShortResource;

class ReviewResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'title'=> $this->resource->title,
            'content'=> $this->resource->content,
            'rate_number'=> $this->resource->rate_number,
            'rate_text' => Review::getDisplayTextScoreByLever($this->resource->rate_number),
            'author' => UserShortResource::make($this->whenLoaded('author')),
            'created_at'=> $this->resource->created_at,
            'updated_at'=> $this->resource->updated_at,
        ];
    }
}
