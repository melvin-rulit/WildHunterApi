<?php

namespace Modules\User\Http\Resources;

use App\Http\Resources\BaseJsonResource;

class UserWhiteListResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'service_id' => $this->resource->object_id,
            'service_model' => $this->resource->object_model,
            'user_id' => $this->resource->user_id,
        ];
    }
}
