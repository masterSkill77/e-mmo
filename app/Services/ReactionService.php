<?php

namespace App\Services;

use App\Models\Reaction;

class ReactionService
{
    public function add_reaction(int $estateId, string $firebaseUser)
    {
        $reaction = new Reaction([
            'estate_id' => $estateId,
            'firebase_user' => $firebaseUser
        ]);
        $reaction->save();
        return $reaction;
    }
    public function remove_reaction(int $reaction_id)
    {
        return Reaction::where("id", $reaction_id)->first()->delete();
    }
}
