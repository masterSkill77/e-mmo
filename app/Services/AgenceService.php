<?php

namespace App\Services;

use App\Models\Agence;
use Illuminate\Support\Facades\DB;

class AgenceService
{
    public function createAgence(array $data)
    {
        DB::transaction(function () use ($data) {
            return Agence::create($data);
        });
    }

    public function getAll()
    {
        return Agence::orderBy('agence_name')->get();
    }

    public function getAgence(int $agenceId)
    {
        return Agence::with('responsable', 'estates')->find($agenceId);
    }

    public function updateAgence(int $agenceId, array $data)
    {
        $status = Agence::where('id', $agenceId)->update($data);
        return $status;
    }
}
