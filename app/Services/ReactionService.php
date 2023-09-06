<?php

namespace App\Services;

use App\Models\Reaction;

class ReactionService
{
    public function getFavorites(int $userId)
    {
        return Reaction::where("user_id", $userId)->with("estate")->get();
    }

    public function handleReaction(int $estateId, bool $vote, int $user_id,)
    {
        $status = 'created';
        if (!$vote) {
            $this->remove_reaction($estateId, $user_id);
            $status = 'deleted';
        } else {
            (new Reaction([
                'estate_id' => $estateId,
                'user_id' => $user_id
            ]))->save();
        }
        return $status;
    }

    public function remove_reaction(int $estate_id, int $user_id)
    {
        return Reaction::where("estate_id", $estate_id)->where("user_id", $user_id)->first()->delete();
    }
}
