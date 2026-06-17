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
                response: 401,
                description: "Не авторизован",
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: "message", type: "string", example: "Не авторизован")
                    ]
                )
            )
        ]
    )]
    public function GetWeapons(): void
    {}
}
