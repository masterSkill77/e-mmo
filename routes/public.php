<?php

use App\Http\Controllers\API\EstateController;
use App\Http\Controllers\API\ReactionController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1/public")->group(function () {

    Route::prefix("/estate")->group(function () {
        Route::get("/", [EstateController::class, 'all']);
    });
    Route::prefix("/reaction")->group(function () {
        Route::get("/", [ReactionController::class, "index"]);
        Route::get("/{estate}/{vote}", [ReactionController::class, "handleReaction"])
            ->middleware(["auth:sanctum"]);
    });
});
