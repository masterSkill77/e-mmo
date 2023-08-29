<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReactionController extends Controller
{
    public function index()
    {
    }
    public function handleReaction(Estate $estate, bool $vote)
    {
        return [$estate, $vote];
    }
}
