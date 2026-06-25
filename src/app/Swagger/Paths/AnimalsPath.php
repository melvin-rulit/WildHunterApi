<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class AnimalsPath
{
    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/animals",
        summary: "Получить список животных",
        security: [['bearerAuth' => []]],
        tags: ["Animals"],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200
            ),
            new OA\Response(
                ref: "#/components/responses/AuthResponse",
                response: 401
            ),
        ]
    )]
    public function getAnimals(): void
    {}
}
