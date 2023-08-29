<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Services\ReactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReactionController extends Controller
{
    public function __construct(private ReactionService $reactionService)
    {
    }
    public function index()
    {
    }
    public function handleReaction(Estate $estate, bool $vote)
    {
        $status =  $this->reactionService->handleReaction($estate->id, $vote, auth()->user()->id);
        return response()->json($status);
    }
}
