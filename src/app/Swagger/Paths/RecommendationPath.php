<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class RecommendationPath
{
    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/offers",
        summary: "Лучшие предложения",
        security: [['bearerAuth' => []]],
        tags: ["Recommendations"],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200
            ),
            new OA\Response(
                response: 401,
                description: "Не авторизован",
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: "message", type: "string", example: "Не авторизован")
                    ]
                )
            )
        ]
    )]
    public function offers(): void
    {}

    #[OA\Post(
        path: "/api/" . ApiConfig::VERSION . "/locations",
        summary: "Лучшие локации",
        security: [['bearerAuth' => []]],
        tags: ["Recommendations"],
        responses: [
            new OA\Response(
                ref: "#/components/responses/SuccessResponse",
                response: 200
            ),
            new OA\Response(
                response: 401,
                description: "Не авторизован",
                content: new OA\JsonContent(
                    properties: [
                        new OA\Property(property: "message", type: "string", example: "Не авторизован")
                    ]
                )
            )
        ]
    )]
    public function locations(): void
    {}
}
