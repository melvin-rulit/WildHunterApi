<?php

namespace Modules\Hotel\Services;

use Modules\Hotel\Models\Hotel;
use Modules\Hotel\Dto\HotelFilterData;

class HotelService
{
    public function getHotels(HotelFilterData $dto): array
    {
        $hotels = Hotel::published()
            ->when($dto->order_by, function ($q) use ($dto) {
                $q->orderBy($dto->order_by, $dto->order_direction ?? 'asc');
            })
            ->when($dto->limit, fn($q) => $q->limit($dto->limit))
            ->get();

        return [
            'code' => '',
            'data' => $hotels
        ];
    }
}
