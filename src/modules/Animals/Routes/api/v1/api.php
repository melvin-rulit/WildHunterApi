<?php

use Illuminate\Support\Facades\Route;
use Modules\Animals\Controllers\AnimalController;

Route::get('/animals', [AnimalController::class, 'getAnimals']);

Route::middleware('auth:sanctum')->group(function () {

});
