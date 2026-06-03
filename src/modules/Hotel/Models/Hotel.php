<?php

namespace Modules\Hotel\Models;

use App\Observers\HotelObserver;
use Modules\Booking\Models\Bookable;
use Modules\Booking\Traits\CapturesService;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Hotel extends Bookable
{
    use SoftDeletes;
    use Notifiable;
    use CapturesService;
    protected $table                              = 'bc_hotels';
    public    $type                               = 'hotel';
    protected $fillable      = [
        'title',
        'content',
        'status',
    ];
    protected string $slugField     = 'slug';
    protected string $slugFromField = 'title';
    protected string $seo_type      = 'hotel';
    protected $casts = [
        'policy' => 'array',
        'extra_price' => 'array',
        'service_fee' => 'array',
        'surrounding' => 'array',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected static function booted(): void
    {
        static::observe(HotelObserver::class);
    }

    public static function getModelName()
    {
        return __("hotel.name.model_name");
    }

    public static function isEnable(): bool
    {
        return setting_item('hotel_disable') == false;
    }
}
