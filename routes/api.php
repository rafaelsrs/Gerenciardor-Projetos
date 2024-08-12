<?php

use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

Route::apiResource('projects', ProjectController::class);

Route::apiResource('activities', ActivityController::class);
