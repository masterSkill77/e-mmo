<?php

namespace App\Services;

use App\Models\Agence;

class userService
{
    public function myAgence(int $userId)
    {
        return Agence::where('responsable_id', $userId)->get();
    }
}
