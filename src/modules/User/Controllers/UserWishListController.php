<?php

namespace Modules\User\Controllers;

use App\Exceptions\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use Modules\Hotel\Models\Hotel;
use Illuminate\Http\JsonResponse;
use App\Exceptions\ConflictException;
use App\Exceptions\ForbiddenException;
use App\Http\Responses\SuccessResponse;
use Modules\User\Http\Resources\UserWhiteListResource;
use Modules\User\Services\UserService;

class UserWishListController
{
    public function __construct(private UserService $userService)
    {
    }

    public function getFavorites(Request $request): JsonResponse
    {
        $result = $this->userService->getFavorites($request->user(), 'hotel');

        return new SuccessResponse(data: UserWhiteListResource::collection($result['wishList']));
    }

    public function checkFavorite(Request $request, Hotel $hotel): JsonResponse
    {
        $result = $this->userService->check($request->user(), $hotel,'hotel');

        return new SuccessResponse(data: $result);
    }

    /**
     * @throws ForbiddenException
     * @throws ConflictException
     * @throws ValidationException
     */
    public function addFavorite(Request $request, Hotel $hotel): JsonResponse
    {
        $result = $this->userService->addFavorite($request->user(), $hotel, 'hotel');

        return new SuccessResponse(code: $result['code'], data: new UserWhiteListResource($result['wishList']));
    }

    public function removeFavorite(Request $request, Hotel $hotel): JsonResponse
    {
        $result = $this->userService->removeFavorite($request->user(), $hotel, 'hotel');

        return new SuccessResponse(code: $result['code'], data: new UserWhiteListResource($result['wishList']));
    }
}
