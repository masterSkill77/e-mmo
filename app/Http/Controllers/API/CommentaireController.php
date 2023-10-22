<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Estate;
use App\Services\CommentaireService;
use Illuminate\Http\Client\Request;

class CommentaireController extends Controller
{
    public function __construct(public CommentaireService $commentaireService)
    {
    }
    public function registerCommentaire(Estate $estate, string | int $user_id)
    {
        $contenu = request("contenu");
        $type = request("type");
        $comment = $this->commentaireService->registerCommentaire($contenu, $estate, $user_id, $type);
        return response()->json($comment);
    }
    public function getCommentaire(Estate $estate)
    {
        $commentaires = $this->commentaireService->getCommentaire($estate->id);
        return response()->json($commentaires);
    }
}
