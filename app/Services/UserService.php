<?php

namespace App\Services;

use App\Models\Agence;
use App\Models\User;

class userService
{
    public function createUser(array $data)
    {
        return User::create($data);
    }
    public function myAgence(int $userId)
    {
        return Agence::where('responsable_id', $userId)->get();
    }
}
