<?php

namespace App\Services;

use App\Models\Agence;

class AgenceService
{
    public function createAgence(array $data)
    {
        return Agence::create($data);
    }
    public function getAgence(int $agenceId)
    {
        return Agence::with('responsable')->find($agenceId);
    }
}
