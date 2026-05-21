<?php

namespace App\Swagger\Responses;

use OpenApi\Attributes as OA;

#[OA\Response(
    response: "ValidationError",
    description: "Ошибка валидации",
    content: new OA\JsonContent(
        properties: [
            new OA\Property(
                property: "message",
                type: "string",
                example: "Данные недействительны"
            ),
            new OA\Property(
                property: "errors",
                type: "object",
                additionalProperties: new OA\AdditionalProperties(
                    type: "array",
                    items: new OA\Items(type: "string")
                )
            ),
        ]
    )
)]
class ValidationError {}
