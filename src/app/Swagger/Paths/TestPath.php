<?php

namespace App\Swagger\Paths;

use OpenApi\Attributes as OA;

class TestPath
{
    #[OA\Get(
        path: "/api/users",
        summary: "Test endpoint",
        responses: [
            new OA\Response( ref: '#/components/schemas/SuccessResponse', response: 200),
//            new OA\Response(ref: '#/components/responses/NotFoundResponse'),

        ]
    )]
    public function test(): void
    {}
}
