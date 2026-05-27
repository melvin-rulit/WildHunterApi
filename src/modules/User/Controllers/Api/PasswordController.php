<?php

namespace Modules\User\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\ValidationException;
use App\Http\Responses\SuccessResponse;
use Modules\User\Dto\Auth\UpdatePasswordData;
use Modules\User\Services\Auth\PasswordService;
use Modules\User\Http\Requests\ChangePasswordRequest;


class PasswordController
{
    public function __construct(private PasswordService $passwordService)
    {
    }

    /**
     * @throws ValidationException
     */
    public function updatePassword(ChangePasswordRequest $request): JsonResponse
    {
        $dto = UpdatePasswordData::fromRequest($request);

        $result = $this->passwordService->update(Auth::user(), $dto);

        return new SuccessResponse($result['code'], domain: 'password');
    }
}
