<?php

namespace App\Services;

use App\Models\Rating;

class RatingService
{
    public function __construct()
    {
        // Constructeur de la classe
    }
    public function store(int $userId, int $agenceId, int $rating)
    {
        $rate = new Rating([
            'user_id' => $userId,
            'agence_id' => $agenceId,
            'value' => $rating
        ]);
        $rate->save();
        return $rate;
    }
    public function ratedAgenceByUser(int $userId)
    {
        return Rating::where('user_id', $userId)->get();
    }
}
