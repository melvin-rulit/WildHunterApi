<?php

namespace App\Swagger\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'SuccessResponse',
    required: ['success', 'message', 'data'],
    type: 'object'
)]
class SuccessResponse
{
    #[OA\Property(example: true)]
    public bool $success;

    #[OA\Property(type: "array",
        items: new OA\Items(type: "object"),
        example: ["id" => 1])]
    public mixed $data;
    #[OA\Property(example: "Operation successful")]
    public string $message;
}
