<?php

namespace Modules\Location\Dto;

use Illuminate\Http\Request;

class LocationFilterData
{
    public function __construct(
        public ?string $order_by,
        public ?string $order_direction,
        public ?string $limit,
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
