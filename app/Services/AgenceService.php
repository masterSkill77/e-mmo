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

    public function updateAgence(int $agenceId, array $data)
    {
        $status = Agence::where('id', $agenceId)->update($data);
        return $status;
    }
}
