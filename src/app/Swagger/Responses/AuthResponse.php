<?php

namespace App\Swagger\Responses;

use OpenApi\Attributes as OA;

#[OA\Response(
    response: "AuthResponse",
    description: "Не авторизован",
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: "success",
                type: "boolean",
                example: false
            ),
            new OA\Property(
                property: "message",
                type: "string",
                example: "Не авторизован"
            ),
            new OA\Property(
                property: "error_code",
                type: "string",
                example: "validation_error"
            ),
        ]
    )
)]
class AuthResponse {}
