<?php

namespace Modules\Review\Dto;

use Illuminate\Foundation\Http\FormRequest;

class ReviewServiceData
{
    public function __construct(
        public ?string $order_by,
        public ?string $order_direction,
        public ?int $limit,
        public ?string $type,
    )
    {}

    public static function fromRequest(FormRequest $request): static
    {
        $data = $request->validated();

        return new self(
            order_by: $data['order_by'] ?? null,
            order_direction: $data['order_direction'] ?? null,
            limit: isset($data['limit']) ? (int)$data['limit'] : null,
            type: $data['type'] ?? null,
        );
    }
}
