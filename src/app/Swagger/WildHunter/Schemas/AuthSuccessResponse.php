<?php

namespace App\Swagger\WildHunter\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'AuthSuccessResponse',
    required: ['success', 'token', 'token_type', 'expires_in_minutes'],
    properties: [
        new OA\Property(property: 'success', type: 'boolean', example: true),

        new OA\Property(property: 'token', type: 'string', example: '1|abc123'),

        new OA\Property(property: 'token_type', type: 'string', example: 'Bearer'),

        new OA\Property(property: 'expires_in_minutes', type: 'integer', example: 60),
    ],
    type: 'object'
)]
class AuthSuccessResponse
{

}
