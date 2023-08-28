<?php

use App\Http\Controllers\API\EstateController;
use Illuminate\Support\Facades\Route;

Route::prefix("/public")->group(function () {
    Route::prefix("/estate")->group(function () {
        Route::get("/", [EstateController::class, 'all']);
    });
});
