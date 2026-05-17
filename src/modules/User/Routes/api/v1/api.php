<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Controllers\UserController;

 Route::middleware('auth:sanctum')->group(function () {
     Route::get('/users', [UserController::class, 'searchUser']);
 });
