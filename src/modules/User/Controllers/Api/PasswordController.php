<?php

namespace Modules\User\Controllers\Api;

use App\Exceptions\BusinessException;
use Random\RandomException;
use App\Service\MailService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\ValidationException;
use App\Http\Responses\SuccessResponse;
use Modules\User\Dto\Auth\UpdatePasswordData;
use Modules\User\Emails\PasswordResetMessageEmail;
use Modules\User\Events\PasswordUpdatedEvent;
use Modules\User\Services\Auth\PasswordService;
use Modules\User\Http\Requests\ResetPasswordRequest;
use Modules\User\Http\Requests\ChangePasswordRequest;
use Modules\User\Http\Requests\SendCodeResetPasswordRequest;


class PasswordController
{
    public function __construct(private PasswordService $passwordService, protected MailService $mailService,)
    {
    }

    /**
     * @throws ValidationException
     */
    public function updatePassword(ChangePasswordRequest $request): JsonResponse
    {
        $dto = UpdatePasswordData::fromRequest($request);

        $result = $this->passwordService->update(Auth::user(), $dto);

        event(new PasswordUpdatedEvent($result['data']));

        return new SuccessResponse(code: $result['code'], domain: 'password');
    }

    /**
     * @throws RandomException
     * @throws ValidationException
     */
    public function sendResetCode(SendCodeResetPasswordRequest $request): JsonResponse
    {
        $result = $this->passwordService->sendResetCode($request->validated('email'));

        $this->mailService->send( $request->input('email'), new PasswordResetMessageEmail($result['reset_code'], $result['ttl']) );

        return new SuccessResponse(code: $result['code'], domain: 'password', replace: [
            'minutes' => $result['ttl'],
        ]);
    }

    /**
     * @throws BusinessException
     */
    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        $data = $request->validated();
        $result = $this->passwordService->resetCode( $data['email'], $data['code'], $data['password'] );

        return new SuccessResponse(code: $result['code'], domain: 'password', data: $result['token']);
    }
}
