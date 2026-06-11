<?php

namespace Modules\User\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\User\Dto\SubscribeData;
use Modules\User\Services\UserService;
use App\Http\Responses\SuccessResponse;
use Modules\User\Http\Resources\UserResource;
use Modules\User\Events\UserSubscriberSubmit;
use Modules\User\Http\Requests\SubscribeRequest;

class UserController
{
    public function __construct(protected UserService $userService)
    {
    }
    public function searchUsers(): JsonResponse
    {
        $result = $this->userService->searchAl();

        return new SuccessResponse(data: new UserResource($result));
    }
    public function searchUser($id): JsonResponse
    {
        $result = $this->userService->searchById($id);

        return new SuccessResponse(data: new UserResource($result));
    }

    public function profileUpdate(): JsonResponse
    {
        $result = $this->userService->update(Auth::user());

        return new SuccessResponse(data: new UserResource($result));
    }

    public function subscribe(SubscribeRequest $request): JsonResponse
    {
        $dto = SubscribeData::fromRequest($request);
        $result = $this->userService->subscribe($dto);

         event(new UserSubscriberSubmit($result['subscriber']));

        return new SuccessResponse(code: $result['code'], domain: 'user');
    }
}
