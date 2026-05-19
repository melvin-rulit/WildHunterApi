<?php

namespace Modules\User\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\User\Services\UserService;

class UserController
{
    public function __construct(protected UserService $userService)
    {
    }
    public function searchUser(Request $request): JsonResponse
    {
        $result = $this->userService->searchById(78);
        $token = $result->createToken('backend-service')->plainTextToken;

        return response()->json($result);
    }
}
