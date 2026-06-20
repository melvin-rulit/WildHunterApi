<?php

namespace Modules\Hotel\Dto;

use Illuminate\Http\Request;

class HotelFilterData
{
    public function __construct(
        public ?string $order_by,
        public ?string $order_direction,
        public ?int $limit,
    ) {}

    public static function fromRequest(Request $request): self
    {
        $data = $request->validated();

        return new self(
            order_by: $data['order_by'] ?? null,
            order_direction: $data['order_direction'] ?? null,
            limit: $data['limit'] ?? null,
        );
    }
}
