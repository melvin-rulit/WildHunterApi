<?php

namespace Modules\Weapon\Http\Resources;

use App\Http\Resources\BaseJsonResource;

class WeaponResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'content' => $this->resource->content,
            'image_url' => null,
            'status' => $this->resource->status,
        ];
    }
}
