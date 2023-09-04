<?php

use App\Http\Controllers\API\AgenceController;
use App\Http\Controllers\API\EstateController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\StaffController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Models\Agence;
use App\Services\SmtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/public.php';


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

        Route::prefix("role")->group(function () {
            Route::get('/', [RoleController::class, 'roleForAgence']);
            Route::post('/', [RoleController::class, 'store']);
            Route::delete('/{role}', [RoleController::class, 'deleteRole']);
        });

        Route::prefix("staff")->group(function () {
            Route::get("/", [StaffController::class, 'myStaff']);
            Route::post("/", [StaffController::class, 'addStaff']);
            Route::delete("/{staffId}/{type}", [StaffController::class, 'removeStaff']);
        });

        Route::prefix('smtp')->group(function () {
            Route::get("/", function (Agence $agence) {
                $credentials = (new SmtpService())->configureMails($agence->id);

                return response()->json($credentials);
            });
        });
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
        Route::get('/for/{agenceId}', [EstateController::class, 'mine']);
        Route::group(['middleware' => 'auth:sanctum', 'prefix' => '/{agenceId}'], function () {
            Route::post('/', [EstateController::class, 'store']);
            Route::get('/mine', [EstateController::class, 'mine']);
            Route::get('/{estate}', [EstateController::class, 'find']);
            Route::put('/{estate}', [EstateController::class, 'update']);
            Route::delete('/{estate}', [EstateController::class, 'destroy']);
        });
        Route::get('/', [EstateController::class, 'all']);
    });

    Route::prefix('auth')->group(function () {
        Route::post('register', RegisterController::class);
        Route::post('login', LoginController::class);
        Route::get("verify-email/{email}", VerifyEmailController::class);
    });

    Route::prefix('immobilier')->group(function () {
    });
});
