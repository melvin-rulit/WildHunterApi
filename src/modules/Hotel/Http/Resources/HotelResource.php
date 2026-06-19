<?php

namespace Modules\Hotel\Http\Resources;

use App\Http\Resources\BaseJsonResource;

class HotelResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'title'=> $this->resource->title,
            'slug'=> $this->resource->slug,
//            'image_url' => $this->resource->getImageUrl(),
            'review_score' => $this->resource->review_score,
            'star_rate' => $this->resource->star_rate,
        ];
    }
}
