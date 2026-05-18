<?php

namespace App\Swagger\WildHunter\Responses;

use OpenApi\Attributes as OA;

#[OA\Response(
    ref: '#/components/schemas/SuccessResponse',
    response: 'SuccessResponse',
    description: 'OK'
)]
class SuccessResponse {}
