<?php

namespace App\Services;

use App\Models\Estate;

class EstateService
{
    public function getEstate(int $estateId)
    {
        return Estate::with('agence', 'photos')->where('id', $estateId)->get();
    }

    public function getAll()
    {
        return Estate::with('photos')->get();
    }

    public function estateForAgence(int $agenceId)
    {
        return Estate::where('agence_id', $agenceId)->with('agence', 'photos')->get();
    }

    public function find(int $estateId)
    {
        return Estate::where('id', $estateId)->with('agence', 'photos')->first();
    }
    public function createEstate(array $data)
    {
        return Estate::create($data);
    }
}
