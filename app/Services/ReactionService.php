<?php

namespace App\Services;

use App\Models\Reaction;

class ReactionService
{
    public function add_reaction(int $estateId, int $userId)
    {
        $reaction = new Reaction([
            'estate_id' => $estateId,
            'user_id' => $userId
        ]);
        $reaction->save();
        return $reaction;
    }
    public function remove_reaction(int $reaction_id)
    {
        return Reaction::where("id", $reaction_id)->first()->delete();
    }
}
