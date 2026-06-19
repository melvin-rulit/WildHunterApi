<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class ReviewPath
{
    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/reviews",
        summary: "Получить все отзывы",
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
        tags: ["Reviews"],
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
    public function GetReviews(): void
    {}

     #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/service/reviews",
        summary: "Получить отзыв для сервиса",
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
        tags: ["Reviews"],
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
    public function GetServiceReviews(): void
    {}
}
