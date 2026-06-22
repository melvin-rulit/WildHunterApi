<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class BookingPath
{
    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/users/{id}/bookings",
        summary: "Получить все бронирования пользователя",
        security: [['bearerAuth' => []]],
        tags: ["Bookings"],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200
            ),
            new OA\Response(
                ref: "#/components/responses/AuthResponse",
                response: 401
            ),
        ]
    )]
    public function GetWeapons(): void
    {}
}
