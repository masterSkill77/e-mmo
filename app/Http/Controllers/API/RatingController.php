<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\RatingService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RatingController extends Controller
{
    public function __construct(public RatingService $ratingService)
    {
    }
    public function rateAgence(Request $request, int $agenceId)
    {
        $user = auth()->user();
        $rating = $request->input('rating');
        $rate = $this->ratingService->store($user->id, $agenceId, $rating);
        return response()->json($rate, Response::HTTP_CREATED);
    }
    public function ratedAgenceByUser()
    {
        $rated = $this->ratingService->ratedAgenceByUser(auth()->user()->id);
        return response()->json($rated);
    }
}
