<?php

use Illuminate\Support\Facades\Route;
use Modules\Weapon\Controllers\WeaponController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [WeaponController::class, 'index']);
//    Route::get('/{slug}','AnimalController@detail');
 });
