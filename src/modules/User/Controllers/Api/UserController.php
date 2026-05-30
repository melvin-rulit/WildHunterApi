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
    public function searchUsers(): JsonResponse
    {
        $result = $this->userService->searchAl();

        return response()->json($result);
    }
    public function searchUser($id): JsonResponse
    {
        $result = $this->userService->searchById($id);

        return response()->json($result);
    }
}
