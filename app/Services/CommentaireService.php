<?php

namespace App\Services;

use App\Jobs\SendNotificationCommsJob;
use App\Models\Commentaire;
use App\Models\Estate;
use Illuminate\Database\Eloquent\Collection;

class CommentaireService
{
    public function registerCommentaire(string $contenu, Estate $estate, int | string $user_id, string | null $email = null)
    {
        $user_id = $user_id == "false" ? null : $user_id;
        $coms = new Commentaire([
            'estate_id' => $estate->id,
            'contenu' => $contenu,
            'user_id' => $user_id,
            'email' => $email
        ]);
        $coms->save();

        dispatch(new SendNotificationCommsJob($coms, $estate));
        return $coms;
    }

    public function getCommentaire(int $estateId): Collection
    {
        return Commentaire::where("estate_id", $estateId)->with('user')->get();
    }
}
