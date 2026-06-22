<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use App\Swagger\Responses\ValidationError;
use OpenApi\Attributes as OA;

class RolePath
{
    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/roles",
        summary: "Получить роли",
        security: [["bearerAuth" => []]],
        tags: ["Roles/Permissions"],
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
    public function GetUsers(): void
    {}

    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/roles/{id}",
        summary: "Получить роль по id",
        security: [["bearerAuth" => []]],
        tags: ["Roles/Permissions"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id роли",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "string")
            )
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
    public function getById(): void {}

    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/roles/code/{code}",
        summary: "Получить роль по коду",
        security: [["bearerAuth" => []]],
        tags: ["Roles/Permissions"],
        parameters: [
            new OA\Parameter(
                name: "code",
                description: "code роли",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "string")
            )
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
    public function getByCode(): void {}

    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/roles/user/{id}",
        summary: "Получить роль пользователя",
        security: [["bearerAuth" => []]],
        tags: ["Roles/Permissions"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id пользователя",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
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
    public function getUserRole(): void {}



}
