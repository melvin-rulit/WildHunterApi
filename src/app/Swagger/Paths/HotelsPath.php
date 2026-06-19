<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class HotelsPath
{
    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/hotels/offers",
        summary: "Лучшие предложения отелей",
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
        tags: ["Hotels"],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200
            ),
            new OA\Response(
                ref: "#/components/responses/ValidationError",
                response: 422
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
    public function offers(): void
    {}

    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/hotels/{id}/comments",
        summary: "Получить комментарии отеля",
        security: [['bearerAuth' => []]],
        tags: ["Hotels"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id отеля",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "integer",
                    example: 1
                )
            ),
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
        ],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200
            ),
            new OA\Response(
                ref: "#/components/responses/ValidationError",
                response: 422
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
    public function comments(): void
    {}

    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/hotels/{id}/favorite",
        summary: "Добавить отель в избранное",
        security: [['bearerAuth' => []]],
        tags: ["Hotels"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id отеля",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "integer",
                    example: 1
                )
            ),
        ],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200
            ),
            new OA\Response(
                ref: "#/components/responses/ValidationError",
                response: 422
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
    public function addFavorite(): void
    {}

    #[OA\Delete(
        path: "/api/" . ApiConfig::VERSION . "/hotels/{id}/favorite",
        summary: "Удалить отель из избранного",
        security: [['bearerAuth' => []]],
        tags: ["Hotels"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id отеля",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "integer",
                    example: 1
                )
            ),
        ],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200
            ),
            new OA\Response(
                ref: "#/components/responses/ValidationError",
                response: 422
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
    public function removeFavorite(): void
    {}
}
