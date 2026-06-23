<?php

namespace Modules\User\Controllers;

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

    /**
     * @throws ForbiddenException
     * @throws ConflictException
     */
    public function addFavorite(Request $request, Hotel $hotel): JsonResponse
    {
        $result = $this->userService->addFavorite($request->user(), $hotel, 'hotel');

        return new SuccessResponse(code: $result['code'], data: new UserWhiteListResource($result['wishList']));
    }

    public function removeFavorite(Request $request, Hotel $hotel)
    {

    }
}
