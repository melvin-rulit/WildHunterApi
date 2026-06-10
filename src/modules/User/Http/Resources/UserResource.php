<?php

namespace Modules\User\Http\Resources;

use App\Http\Resources\BaseJsonResource;

class UserResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'nik' => $this->resource->user_name,
            'birthday' => $this->resource->birthday,
            'email' => $this->resource->email,
            'avatar_url' => $this->resource->avatar_url,
            'phone' => $this->resource->phone,
            'city' => $this->resource->city,
            'address' => $this->resource->address,
            'role' => $this->resource->role_name,
            'current_password' => $this->resource->current_password,
            'is_verified' => $this->resource->is_verified,
            'status' => $this->resource->status,
            'hunter_billet_number' => $this->resource->hunter_billet_number,
            'hunter_license_number' => $this->resource->hunter_license_number,
            'hunter_license_date' => $this->resource->hunter_license_date,
            'weapon_type_id' => $this->resource->weapon_type_id,
            'caliber' => $this->resource->caliber,
        ];
    }
}
