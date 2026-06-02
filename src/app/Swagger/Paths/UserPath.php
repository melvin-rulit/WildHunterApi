<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class UserPath
{
    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/users",
        summary: "Получить пользователей",
        security: [['bearerAuth' => []]],
        tags: ["Users"],
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
    public function GetUsers(): void
    {}

    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/user/{id}",
        summary: "Получить пользователя",
        security: [['bearerAuth' => []]],
        tags: ["Users"],
        parameters: [
            new OA\Parameter(
                name: "id",
                description: "id пользователя",
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
    public function GetUser(): void
    {}


    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/user/change-password",
        summary: "Смена пароля пользователя",
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["current_password", "new_password", "new_password_confirmation"],
                properties: [
                    new OA\Property(
                        property: "current_password",
                        type: "string",
                        example: "OldPassword123"
                    ),
                    new OA\Property(
                        property: "new_password",
                        type: "string",
                        example: "NewPassword123"
                    ),
                    new OA\Property(
                        property: "new_password_confirmation",
                        type: "string",
                        example: "NewPassword123"
                    ),
                ]
            )
        ),
        tags: ["Users"],
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
    public function changePassword(): void
    {}

    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/user/newsletter/subscribe",
        summary: "Подписка на рассылку",
        security: [['bearerAuth' => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["email", "privacy_policy"],
                properties: [
                    new OA\Property(
                        property: "email",
                        type: "string",
                        format: "email",
                        example: "user@example.com"
                    ),
                    new OA\Property(
                        property: "privacy_policy",
                        type: "boolean",
                        example: true
                    ),
                ]
            )
        ),
        tags: ["Users"],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200,
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
                        new OA\Property(
                            property: "message",
                            type: "string",
                            example: "Не авторизован"
                        )
                    ]
                )
            )
        ]
    )]
    public function subscribeNewsletter(): void
    {}
}
