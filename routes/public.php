<?php

use App\Http\Controllers\API\EstateController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1/public")->group(function () {
    Route::prefix("/estate")->group(function () {
        Route::get("/", [EstateController::class, 'all']);
    });
});
