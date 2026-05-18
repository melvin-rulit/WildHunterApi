<?php

namespace Modules\User\Services\Auth;

use Illuminate\Support\Facades\Hash;
use Modules\User\Dto\Auth\LoginData;
use Modules\User\Services\UserService;
use App\Exceptions\UnauthorizedException;

class AuthService
{
    public function __construct(private UserService $userService)
    {
    }

    /**
     * @throws UnauthorizedException
     */
    public function login(LoginData $dto): array
    {
        $user = $this->userService->findByEmail($dto->email);

        if (! $user || ! Hash::check($dto->password, $user->password)) {
            throw new UnauthorizedException();
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }

    public function refresh()
    {
        
    }
}
