<?php

use App\Http\Controllers\API\QuestionController;
use App\Livewire\Metabase;
use App\Models\Agence;
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
    $questions = Question::where("question_for", "admin")->get();
    return view('welcome', [
        'questions' => $questions
    ]);
});

Route::get("/metabase", function () {
    $questions = Question::all();
    return view('metabase', [
        'questions' => $questions
    ]);
})->middleware('auth');

Route::get("/agence-request", function () {
    $agences = Agence::with(['responsable', 'photos'])->where('active', false)->get();
    return view('agence-request', [
        'agences' => $agences
    ]);
})->middleware('auth');


Route::get("/agence-request/{agenceId}", function (int $agenceId) {
    $agence = Agence::where('id', $agenceId)->first();
    $agence->active = true;
    $agence->save();
    return redirect()->to(("/agence-request"));
})->middleware('auth');




Route::post("/metabase", [QuestionController::class, 'store'])->middleware('auth');
