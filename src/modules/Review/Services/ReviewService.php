<?php

namespace Modules\Review\Services;

use Modules\Review\Models\Review;

class ReviewService
{
    public function indexByService(Review $review, $dto): array
    {
        $reviews = Review::with('author')
            ->where('object_model', $dto->type)
            ->where('object_id', $review->id)
            ->where('status', Review::APPROVED)
            ->when($dto->order_by, function ($q) use ($dto) {
                $q->orderBy($dto->order_by, $dto->order_direction ?? 'asc');
            })
            ->when($dto->limit, fn($q) => $q->limit($dto->limit))
            ->get();

        return [
            'reviews' => $reviews,
        ];
    }
    public function serviceReviews($dto): array
    {
        $reviews = Review::with('author')
            ->where('object_model', $dto->type)
            ->when($dto->order_by, function ($q) use ($dto) {
                $q->orderBy($dto->order_by, $dto->order_direction ?? 'asc');
            })
            ->when($dto->limit, fn($q) => $q->limit($dto->limit))
            ->get();

        return [
            'reviews' => $reviews,
        ];
    }
}
