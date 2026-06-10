<?php

namespace Modules\Weapon\Services;

use Modules\Weapon\Models\WeaponType;
use Illuminate\Database\Eloquent\Collection;

class WeaponService
{
    public function gertWeapons(): Collection
    {
        return WeaponType::all();
    }
}
