<?php

namespace Modules\User\Http\Resources;

use App\Http\Resources\BaseJsonResource;

class UserWeaponResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'hunter_billet_number' => $this->resource->hunter_billet_number,
            'hunter_license_number' => $this->resource->hunter_license_number,
            'hunter_license_date' => $this->resource->hunter_license_date,
            'weapon_type' => $this->resource->type?->title,
            'caliber' => $this->resource->caliber,
        ];
    }
}
