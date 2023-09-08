<?php

namespace App\Services;

use App\Jobs\SendNotificationCommsJob;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Collection;

class CommentaireService
{
    public function registerCommentaire(string $contenu, int $estateId, int | string $user_id, string | null $email = null)
    {
        $user_id = $user_id == "false" ? null : $user_id;
        $coms = new Commentaire([
            'estate_id' => $estateId,
            'contenu' => $contenu,
            'user_id' => $user_id,
            'email' => $email
        ]);
        $coms->save();
        dispatch(new SendNotificationCommsJob($coms));
        return $coms;
    }

    public function getCommentaire(int $estateId): Collection
    {
        return Commentaire::where("estate_id", $estateId)->with('user')->get();
    }
}
