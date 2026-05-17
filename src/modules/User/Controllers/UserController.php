<?php

namespace Modules\User\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\User\Services\UserService;

class UserController
{
    public function __construct(protected UserService $userService)
    {
    }
    public function searchUser(Request $request): JsonResponse
    {
        $result = $this->userService->searchUserById(78);
        $token = $result->createToken('backend-service')->plainTextToken;

        return response()->json($result);
    }
}
