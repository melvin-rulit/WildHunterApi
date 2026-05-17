<?php

namespace App\Swagger\Bookrest;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: ApiConfig::VERSION,
    title: "Book Rest API"
)]

#[OA\SecurityScheme(
    securityScheme: "bearerAuth",
    type: "http",
    bearerFormat: "JWT",
    scheme: "bearer"
)]
final class OpenApi {}
