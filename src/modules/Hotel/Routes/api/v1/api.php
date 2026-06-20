<?php

use Illuminate\Support\Facades\Route;
use Modules\Hotel\Controllers\HotelController;
use Modules\User\Controllers\UserWishListController;

Route::post('/hotels/offers', [HotelController::class, 'getHotels']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/hotels/{hotel}/favorite', [UserWishListController::class, 'addFavorite']);
    Route::delete('/hotels/{hotel}/favorite', [UserWishListController::class, 'removeFavorite']);
});
