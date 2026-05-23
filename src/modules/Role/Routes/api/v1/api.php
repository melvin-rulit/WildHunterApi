<?php

use Illuminate\Support\Facades\Route;
use Modules\Role\Controllers\RoleController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/roles', [RoleController::class, 'roles']);
    Route::get('/roles/{id}', [RoleController::class, 'getById'])->whereNumber('id');
    Route::get('/roles/code/{code}', [RoleController::class, 'getByCode']);
 });
