<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data["_token"]);
        $question = new Question($data);
        $question->save();
        return redirect()->back();
    }
    public function getQuestionFor(string $type)
    {
        $questions =  Question::where("question_for", $type)->get();
        return response()->json($questions);
    }
}
