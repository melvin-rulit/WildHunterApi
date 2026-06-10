<?php

namespace Modules\Weapon\Models;

use App\Models\User;
use Modules\Booking\Models\Bookable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeaponType extends Bookable
{
    protected $table = 'bc_weapons';

    protected $fillable = ['name', 'type', 'description'];
//    protected $translation_class = WeaponTranslation::class;

    public static function isEnable(): bool
    {
        return true;
    }

    public function calibers(): HasMany
    {
        return $this->hasMany(Caliber::class);
    }
}
