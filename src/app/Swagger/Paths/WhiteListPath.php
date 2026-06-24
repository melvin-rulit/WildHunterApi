<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class WhiteListPath
{
    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/services/{id}/favorites",
        summary: "Является ли сервис избранным для пользователя",
        security: [['bearerAuth' => []]],
        tags: ["WhiteList"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id сервиса",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "integer",
                    example: 1
                )
            ),
            new OA\Parameter(
                name: "type",
                description: "тип сервиса",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "string",
                    example: "hotel"
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
                ref: "#/components/responses/AuthResponse",
                response: 401
            ),
        ]
    )]
    public function getFavorites(): void
    {}

    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/services/favorites",
        summary: "Получить избранное пользователя",
        security: [['bearerAuth' => []]],
        tags: ["WhiteList"],
        parameters: [
            new OA\Parameter(
                name: "type",
                description: "тип сервиса",
                in: "query",
                required: true,
                schema: new OA\Schema(
                    type: "string",
                    example: "hotel"
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
                ref: "#/components/responses/AuthResponse",
                response: 401
            ),
        ]
    )]
    public function getUserFavorites(): void
    {}

    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/services/{id}/favorite",
        summary: "Добавить сервис в избранное",
        security: [['bearerAuth' => []]],
        tags: ["WhiteList"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id сервиса",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "integer",
                    example: 1
                )
            ),
            new OA\Parameter(
                name: "type",
                description: "тип сервиса",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "string",
                    example: "hotel"
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
                ref: "#/components/responses/AuthResponse",
                response: 401
            ),
        ]
    )]
    public function addFavorite(): void
    {}

    #[OA\Delete(
        path: "/api/" . ApiConfig::VERSION . "/services/{id}/favorite",
        summary: "Удалить сервис из избранного",
        security: [['bearerAuth' => []]],
        tags: ["WhiteList"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id сервиса",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "integer",
                    example: 1
                )
            ),
            new OA\Parameter(
                name: "type",
                description: "тип сервиса",
                in: "path",
                required: true,
                schema: new OA\Schema(
                    type: "string",
                    example: "hotel"
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
                ref: "#/components/responses/AuthResponse",
                response: 401
            ),
        ]
    )]
    public function removeFavorite(): void
    {}
}
