<?php

use Illuminate\Support\Facades\Route;
use Modules\Hotel\Controllers\HotelController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/hotels/offers', [HotelController::class, 'getHotels']);
});
