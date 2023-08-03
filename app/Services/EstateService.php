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
        return Estate::with('agence', 'photos')->agence($agenceId)->get();
    }
    public function createEstate(array $data)
    {
        return Estate::create($data);
    }
}
