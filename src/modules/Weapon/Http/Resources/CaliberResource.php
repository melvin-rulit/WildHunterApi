<?php

namespace Modules\Weapon\Http\Resources;

use App\Http\Resources\BaseJsonResource;

class CaliberResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'content' => $this->resource->content,
            'status' => $this->resource->status,
        ];
    }
}
