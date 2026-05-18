<?php

namespace App\Swagger\WildHunter\Paths;

use App\Swagger\WildHunter\ApiConfig;
use OpenApi\Attributes as OA;

class UserPath
{
    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/users",
        summary: "Получить пользователей",
        security: [['bearerAuth' => []]],
        tags: ["Users"],
        responses: [
            new OA\Response( ref: '#/components/schemas/SuccessResponse', response: 200),

        ]
    )]
    public function GetUsers(): void
    {}

    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/login",
        summary: "Аутентификация пользователя",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["email", "password"],
                properties: [
                    new OA\Property(
                        property: "email",
                        type: "string",
                        format: "email"
                    ),
                    new OA\Property(
                        property: "password",
                        type: "string",
                        format: "password"
                    ),
                ]
            )
        ),
        tags: ["Users"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Успешная авторизация",
                content: new OA\JsonContent(
                    ref: '#/components/schemas/AuthSuccessResponse'
                )
            )

        ]
    )]
    public function login(): void
    {}
}
