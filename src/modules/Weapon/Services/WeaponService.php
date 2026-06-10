<?php

namespace Modules\Weapon\Services;

use Modules\User\Models\UserWeapon;
use Modules\Weapon\Models\Caliber;
use Modules\Weapon\Models\WeaponType;
use Modules\Weapon\Dto\SaveUserWeaponData;
use Illuminate\Database\Eloquent\Collection;

class WeaponService
{
    public function gertWeapons(): Collection
    {
        return WeaponType::all();
    }
    public function gertCalibers(): Collection
    {
        return Caliber::all();
    }

    public function storeUserWeapon($userId, SaveUserWeaponData $dto): array
    {
        UserWeapon::create([
            'user_id' => $userId,
            'hunter_billet_number' => $dto->hunter_billet_number,
            'hunter_license_number' => $dto->hunter_license_number,
            'hunter_license_date' => $dto->hunter_license_date,
            'weapon_type_id' => $dto->weapon_type_id,
            'caliber' => $dto->caliber,
        ]);

        return [
            'code' => 'save_success',
        ];
    }
}
