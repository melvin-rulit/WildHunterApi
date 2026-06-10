<?php

namespace Modules\Weapon\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class SaveUserWeaponRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'hunter_billet_number' => ['required', 'string', 'max:255'],
            'hunter_license_number' => ['required', 'string', 'max:255'],
            'hunter_license_date' => ['required', 'date'],
            'weapon_type_id' => ['required', 'integer', 'exists:weapon_types,id'],
            'caliber' => ['required', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'hunter_billet_number.required' => __('weapon.validation.hunter_billet_number_required'),
            'hunter_billet_number.string' => __('weapon.validation.hunter_billet_number_string'),

            'hunter_license_number.required' => __('weapon.validation.hunter_license_number_required'),
            'hunter_license_number.string' => __('weapon.validation.hunter_license_number_string'),

            'hunter_license_date.required' => __('weapon.validation.hunter_license_date_required'),
            'hunter_license_date.date' => __('weapon.validation.hunter_license_date_invalid'),

            'weapon_type_id.required' => __('weapon.validation.weapon_type_required'),
            'weapon_type_id.exists' => __('weapon.validation.weapon_type_not_found'),

            'caliber.required' => __('weapon.validation.caliber_required'),
            'caliber.string' => __('weapon.validation.caliber_string'),
        ];
    }
}
