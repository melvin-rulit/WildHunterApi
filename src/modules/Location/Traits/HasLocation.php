<?php

namespace Modules\Location\Traits;

use Modules\Location\Models\Location;

trait HasLocation
{

    /**
     * Get Location
     */
    public function location()
    {
        return $this->belongsTo(Location::class, "location_id")->with(['translation']);
    }
}
