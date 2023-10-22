<?php

use App\Http\Controllers\API\CommentaireController;
use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\EstateController;
use App\Http\Controllers\API\MediaController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\ReactionController;
use Illuminate\Support\Facades\Route;

Route::prefix("v1/public")->group(function () {

    Route::prefix("/estate")->group(function () {
        Route::get("/", [EstateController::class, 'all']);
        Route::get("/{estate}", [EstateController::class, "getImmo"]);
    });
    Route::prefix("/commentaire")->group(function () {
        Route::get("/{estate}", [CommentaireController::class, "getCommentaire"]);
        Route::put("/{estate}", [CommentaireController::class, "updateCommentaire"]);
        Route::post("/{estate}/{userId}", [CommentaireController::class, "registerCommentaire"]);
    });

    Route::prefix("/reaction")->group(function () {
        Route::get("/", [ReactionController::class, "index"]);
        Route::get("/favorites", [ReactionController::class, "favorites"])->middleware(["auth:sanctum"]);
        Route::get("/{estate}/{vote}", [ReactionController::class, "handleReaction"])
            ->middleware(["auth:sanctum"]);
    });
    Route::prefix("/agence")->group(function () {
        Route::get("/logo-{imageId}", [MediaController::class, 'getLogo']);
        Route::post("/logo", [MediaController::class, 'uploadImage']);
    });
    Route::prefix("/contact")->middleware(["auth:sanctum"])->group(function () {
        Route::get("/", [ContactController::class, "getContactForUser"]);
        Route::post("/{agence}", [ContactController::class, "addContact"]);
        Route::get("/{agence}", [ContactController::class, "getContactForAgence"]);
        Route::delete("/{agence}", [ContactController::class, "removeContact"]);
    });

    Route::prefix("/metabase")->group(function () {
        Route::get("/for-{type}", [QuestionController::class, 'getQuestionFor']);
    });
});
