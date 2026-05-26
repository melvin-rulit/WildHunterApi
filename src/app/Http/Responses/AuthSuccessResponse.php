<?php

namespace App\Http\Responses;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Modules\User\Http\Resources\UserLoginResource;

/**
 * Class ErrorResponse
 *
 */
final class AuthSuccessResponse extends JsonResponse
{
    public function __construct(string $token, User $user, int $status = 200)
    {
        parent::__construct([
                'success' => true,
                'token' => $token,
                'token_type' => 'Bearer',
                'expires_in_minutes' => config('sanctum.expiration'),
                'user' => new UserLoginResource($user),
            ], $status);
    }
}
