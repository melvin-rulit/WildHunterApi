<?php

namespace Modules\Weapon\Dto;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SaveUserWeaponData
{
    public function __construct(
        public string $hunter_billet_number,
        public string $hunter_license_number,
        public Carbon $hunter_license_date,
        public int $weapon_type_id,
        public string $caliber,
    ) {}

    public static function fromRequest(Request $request): self
    {
        $data = $request->validated();

        return new self(
            hunter_billet_number: $data['hunter_billet_number'],
            hunter_license_number: $data['hunter_license_number'],
            hunter_license_date: Carbon::parse($data['hunter_license_date']),
            weapon_type_id: (int) $data['weapon_type_id'],
            caliber: $data['caliber'],
        );
    }
}
