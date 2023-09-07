<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class MetabaseController extends Controller
{
    public function __invoke(string $type)
    {
        return Question::where("question_for", $type)->get();
    }
}
