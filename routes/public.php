<?php

use App\Http\Controllers\API\CommentaireController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\EstateController;
use App\Http\Controllers\API\ReactionController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1/public")->group(function () {

    Route::prefix("/estate")->group(function () {
        Route::get("/", [EstateController::class, 'all']);
        Route::get("/{estate}", [EstateController::class, "getImmo"]);
    });
    Route::prefix("/commentaire")->group(function () {
        Route::get("/{estate}", [CommentaireController::class, "getCommentaire"]);
        Route::post("/{estate}/{userId}", [CommentaireController::class, "registerCommentaire"]);
    });

    Route::prefix("/reaction")->group(function () {
        Route::get("/", [ReactionController::class, "index"]);
        Route::get("/{estate}/{vote}", [ReactionController::class, "handleReaction"])
            ->middleware(["auth:sanctum"]);
    });

    Route::prefix("/contact")->middleware(["auth:sanctum"])->group(function () {
        Route::get("/", [ContactController::class, "getContactForUser"]);
        Route::post("/{agence}", [ContactController::class, "addContact"]);
        Route::get("/{agence}", [ContactController::class, "getContactForAgence"]);
        Route::delete("/{agence}", [ContactController::class, "removeContact"]);
    });
});
