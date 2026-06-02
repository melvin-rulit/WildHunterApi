<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class LocationPath
{
    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/locations/offers",
        summary: "Лучшие предложения локаций",
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: "order_by",
                        type: "string",
                        example: "created_at"
                    ),
                    new OA\Property(
                        property: "order_direction",
                        type: "string",
                        example: "desc",
                        enum: ["asc", "desc"]
                    ),
                    new OA\Property(
                        property: "limit",
                        type: "integer",
                        example: "3"
                    ),
                ]
            )
        ),
        tags: ["Locations"],
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
    public function locations(): void
    {}
}
