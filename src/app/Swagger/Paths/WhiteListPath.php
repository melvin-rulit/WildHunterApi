<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class WhiteListPath
{
    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/hotels/{id}/favorite",
        summary: "Добавить отель в избранное",
        security: [['bearerAuth' => []]],
        tags: ["WhiteList"],
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
        path: "/api/" . ApiConfig::VERSION . "/hotels/{id}/favorite",
        summary: "Удалить отель из избранного",
        security: [['bearerAuth' => []]],
        tags: ["WhiteList"],
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
