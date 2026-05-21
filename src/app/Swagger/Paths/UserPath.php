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
        ]
    )]
    public function GetUsers(): void
    {}
}
