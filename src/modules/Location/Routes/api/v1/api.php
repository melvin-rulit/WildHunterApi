<?php

use Illuminate\Support\Facades\Route;
use Modules\Location\Controllers\LocationController;

Route::post('/locations/offers', [LocationController::class, 'getLocations']);

Route::middleware('auth:sanctum')->group(function () {


 });
