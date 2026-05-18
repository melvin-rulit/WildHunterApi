<?php

namespace App\Swagger\WildHunter;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: ApiConfig::VERSION,
    title: "WildHunter API"
)]

#[OA\SecurityScheme(
    securityScheme: "bearerAuth",
    type: "http",
    bearerFormat: "JWT",
    scheme: "bearer"
)]
final class OpenApi {}
