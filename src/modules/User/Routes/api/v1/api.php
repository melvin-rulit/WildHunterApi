<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Controllers\Api\AuthController;
use Modules\User\Controllers\Api\WildHunter\UserController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
     Route::get('/users', [UserController::class, 'searchUser']);
 });
