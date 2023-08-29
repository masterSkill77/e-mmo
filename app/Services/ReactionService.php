<?php

namespace App\Services;

use App\Models\Reaction;

class ReactionService
{
    public function add_reaction(int $estateId, int $user_id)
    {
        $reaction = new Reaction([
            'estate_id' => $estateId,
            'user_id' => $user_id
        ]);
        $reaction->save();
        return $reaction;
    }
    public function remove_reaction(int $reaction_id)
    {
        return Reaction::where("id", $reaction_id)->first()->delete();
    }
}
