<?php

namespace App\Swagger\Paths;

use App\Swagger\ApiConfig;
use OpenApi\Attributes as OA;

class WeaponPath
{
    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/weapons",
        summary: "Получить все типы оружий",
        security: [['bearerAuth' => []]],
        tags: ["Weapons"],
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
    public function GetWeapons(): void
    {}    #[OA\Get(
        path: "/api/" . ApiConfig::VERSION . "/calibers",
        summary: "Получить калибр оружий",
        security: [['bearerAuth' => []]],
        tags: ["Weapons"],
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
    public function GetCalibers(): void
    {}
}
