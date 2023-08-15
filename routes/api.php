<?php

use App\Http\Controllers\API\AgenceController;
use App\Http\Controllers\API\EstateController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Agence;
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
    Route::prefix('{agence}')->group(function () {
        Route::get('/role', [RoleController::class, 'roleForAgence']);
        Route::post('/role', [RoleController::class, 'store']);
        Route::delete('/role/{role}', [RoleController::class, 'deleteRole']);
    });
    // ->middleware(['auth:sanctum']);
    Route::prefix('agence')->group(function () {
        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::post('/', [AgenceController::class, 'store']);
            Route::put('/{agenceId}', [AgenceController::class, 'update']);
            Route::get('/mine', [AgenceController::class, 'mine']);
        });
        Route::get('/', [AgenceController::class, 'all']);
        Route::get('/{agenceId}', [AgenceController::class, 'find']);
    });

    Route::prefix('estate')->group(function () {
        Route::group(['middleware' => 'auth:sanctum', 'prefix' => '/{agenceId}'], function () {
            Route::post('/', [EstateController::class, 'store']);
            Route::get('/mine', [EstateController::class, 'mine']);
            Route::get('/{estate}', [EstateController::class, 'find']);
            Route::put('/{estate}', [EstateController::class, 'update']);
            Route::delete('/{estate}', [EstateController::class, 'destroy']);
        });
        Route::get('/', [EstateController::class, 'all']);
        // Route::put('/{agenceId}', [EstateController::class, 'update']);
    });

    Route::prefix('auth')->group(function () {
        Route::post('register', RegisterController::class);
        Route::post('login', LoginController::class);
    });

    Route::prefix('immobilier')->group(function () {
    });
});
