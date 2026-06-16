<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Controllers\Api\AuthController;
use Modules\User\Controllers\Api\UserController;
use Modules\User\Controllers\Api\PasswordController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

//Newsletter
Route::post('/user/newsletter/subscribe',[UserController::class, 'subscribe']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'searchUsers']);
    Route::get('/user/{user}', [UserController::class, 'searchUser']);
    Route::post('/user', [UserController::class, 'profileUpdate']);

    Route::post('/user/change-password', [PasswordController::class, 'updatePassword']);
 });
