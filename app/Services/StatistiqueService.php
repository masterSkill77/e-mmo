<?php

namespace App\Services;

use App\Models\Estate;

class StatistiqueService
{
    public function getEstates($agenceId)
    {
        return Estate::where('agence_id', $agenceId)->groupBy("created_at")->get();
    }
}
