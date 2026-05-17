<?php

namespace App\Swagger\Bookrest\Paths;

use App\Swagger\Bookrest\ApiConfig;
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
//            new OA\Response(ref: '#/components/responses/NotFoundResponse'),

        ]
    )]
    public function test(): void
    {}
}
