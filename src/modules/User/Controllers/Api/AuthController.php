<?php

namespace Modules\User\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Modules\User\Dto\Auth\LoginData;
use App\Exceptions\UnauthorizedException;
use Modules\User\Http\Requests\Auth\RefreshTokenRequest;
use Modules\User\Services\Auth\AuthService;
use App\Http\Responses\AuthSuccessResponse;
use Modules\User\Http\Requests\Auth\LoginRequest;

class AuthController
{
    public function __construct(private AuthService $authService)
    {
    }

    /**
     * @throws UnauthorizedException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $dto = LoginData::fromRequest($request);
        $result = $this->authService->login($dto);

        return new AuthSuccessResponse($result['token'], $result['user']);
    }
    public function logout(Request $request): Response
    {
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }

    public function refreshToken(RefreshTokenRequest $request)
    {

    }
}
