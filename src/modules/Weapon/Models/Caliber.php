<?php

namespace Modules\Weapon\Models;

use Modules\Booking\Models\Bookable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Caliber extends Bookable
{
    protected $table = 'bc_calibers';

    protected $fillable = ['name', 'type', 'description'];
//    protected $translation_class = CaliberTranslation::class;

    public static function isEnable(): bool
    {
        return true;
    }

    public function weaponType(): BelongsTo
    {
        return $this->belongsTo(WeaponType::class);
    }
}
