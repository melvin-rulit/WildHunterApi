<?php

namespace App\Swagger\Responses;

use OpenApi\Attributes as OA;

#[OA\Response(
    response: "SuccessResponse",
    description: "Стандартный API ответ",
    content: new OA\JsonContent(
        properties: [
            new OA\Property(property: "success", type: "boolean", example: true),
            new OA\Property(property: "message", type: "string", example: ""),
            new OA\Property(property: "data", type: "object")
        ]
    )
)]
class SuccessResponse {}
