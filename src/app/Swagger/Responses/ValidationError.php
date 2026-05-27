<?php

namespace App\Swagger\Responses;

use OpenApi\Attributes as OA;

#[OA\Response(
    response: "ValidationError",
    description: "Ошибка валидации",
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
                example: "Ошибка валидации"
            ),
            new OA\Property(
                property: "error_code",
                type: "string",
                example: "validation_error"
            ),
            new OA\Property(
                property: "trace_id",
                type: "string",
                example: "59ad9bad-0917-42aa-baca-6c1aeb07f021"
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
