<?php

namespace Modules\Location\Services;

use Modules\Location\Models\Location;
use Modules\Location\Dto\LocationFilterData;

class LocationService
{
    public function getBestLocations(LocationFilterData $dto): array
    {
        $locations = Location::published()
            ->withCount('hotels')
            ->when($dto->order_by, function ($q) use ($dto) {
                $q->orderBy($dto->order_by, $dto->order_direction ?? 'asc');
            })
            ->when($dto->limit, fn($q) => $q->limit($dto->limit))
            ->get();

        return [
            'locations' => $locations
        ];
    }
    public function getLocations(LocationFilterData $dto): array
    {
        $locations = Location::published()->get();

        return [
            'locations' => $locations
        ];
    }
}
