<?php

namespace Modules\User\Http\Resources;

use App\Http\Resources\BaseJsonResource;
use Modules\Weapon\Http\Resources\UserWeaponResource;

class UserWithWeaponResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'nik' => $this->resource->user_name,
            'birthday' => $this->resource->birthday?->translatedFormat('d F Y г.'),
            'email' => $this->resource->email,
            'avatar_url' => $this->resource->avatar_url,
            'phone' => $this->resource->phone,
            'city' => $this->resource->city,
            'address' => $this->resource->address,
            'role' => $this->resource->role_name,
            'current_password' => $this->resource->current_password,
            'bio' => $this->resource->bio,
            'is_verified' => $this->resource->is_verified,
            'status' => $this->resource->status,
            'hunter_billet_number' => $this->resource->hunter_billet_number,
            'created_at' => $this->resource->created_at?->translatedFormat('d F Y г.'),
            'weapons' => UserWeaponResource::collection($this->resource->weapons),
        ];
    }
}
