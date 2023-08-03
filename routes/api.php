<?php

use App\Http\Controllers\API\AgenceController;
use App\Http\Controllers\API\EstateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('agence')->group(function () {
        Route::post('/', [AgenceController::class, 'store']);
        Route::get('/', [AgenceController::class, 'all']);
        Route::get('/{agenceId}', [AgenceController::class, 'find']);
        Route::put('/{agenceId}', [AgenceController::class, 'update']);
    });

    Route::prefix('estate')->group(function () {
        Route::post('/', [EstateController::class, 'store']);
        Route::get('/', [EstateController::class, 'all']);
        // Route::get('/{agenceId}', [EstateController::class, 'find']);
        // Route::put('/{agenceId}', [EstateController::class, 'update']);
    });

    Route::prefix('immobilier')->group(function () {
    });
});
