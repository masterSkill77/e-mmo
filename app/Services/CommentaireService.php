<?php

namespace App\Services;

use App\Jobs\SendNotificationCommsJob;
use App\Models\Commentaire;
use App\Models\Estate;
use Illuminate\Database\Eloquent\Collection;

class CommentaireService
{
    public function registerCommentaire(string $contenu, Estate $estate, int | string $user_id, string | null $type = null)
    {
        $coms = new Commentaire([
            'estate_id' => $estate->id,
            'contenu' => $contenu,
        ]);

        if ($type == 'agence')
            $coms->agence_id = $user_id;
        else $coms->user_id = $user_id;
        $coms->save();

        dispatch(new SendNotificationCommsJob($coms, $estate));
        return $coms;
    }

    public function getCommentaire(int $estateId): Collection
    {
        return Commentaire::where("estate_id", $estateId)->with('user', 'agence')->get();
    }
    public function updateCommentaire(int $commentaireId, string $contenu)
    {
        $commentaire =  Commentaire::where("id", $commentaireId)->first();
        $commentaire->contenu = $contenu;
        $commentaire->update();
        return $commentaire;
    }public function removeCommentaire(int $commentaireId) {
        $commentaire =  Commentaire::where("id", $commentaireId)->first();
        $commentaire->delete();
        return $commentaire;
    }
}
