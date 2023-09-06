<?php

use App\Http\Controllers\API\QuestionController;
use App\Livewire\Metabase;
use App\Models\Question;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/metabase", function () {
    $questions = Question::all();
    return view('metabase', [
        'questions' => $questions
    ]);
})->middleware('auth');

Route::get("/agence-request", function () {
    $questions = Question::all();
    return view('agence-request', [
        'questions' => $questions
    ]);
})->middleware('auth');




Route::post("/metabase", [QuestionController::class, 'store'])->middleware('auth');
