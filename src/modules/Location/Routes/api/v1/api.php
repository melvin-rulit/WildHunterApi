<?php

use Illuminate\Support\Facades\Route;
use Modules\Location\Controllers\LocationController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/locations/offers', [LocationController::class, 'getLocations']);
 });
