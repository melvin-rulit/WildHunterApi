<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class AuthPath
{
    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/login",
        summary: "Аутентификация пользователя",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["email", "password"],
                properties: [
                    new OA\Property(property: "email", type: "string", format: "email"),
                    new OA\Property(property: "password", type: "string", format: "password"),
                ],
                type: "object",
                example: [
                    "email" => "test@test.com",
                    "password" => "secret"
                ]
            )
        ),
        tags: ["Auth"],
        responses: [
            new OA\Response(
                response: 200,
                description: "Успешная авторизация",
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: "success", type: "boolean", example: true),
                        new OA\Property(property: "token", type: "string", example: "1|abc123"),
                        new OA\Property(property: "token_type", type: "string", example: "Bearer"),
                        new OA\Property(property: "expires_in_minutes", type: "integer", example: 60),
                    ]
                )
            )
        ]
    )]
    public function login(): void
    {}

    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/logout",
        summary: "Выход пользователя из системы",
        security: [['bearerAuth' => []]],
        tags: ["Auth"],
        responses: [
            new OA\Response(
                response: 204,
                description: "Успешный выход (токен удалён)"
            ),
            new OA\Response(
                response: 401,
                description: "Не авторизован",
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: "message", type: "string", example: "Unauthenticated")
                    ]
                )
            )
        ]
    )]
    public function logout(): void
    {}
}
