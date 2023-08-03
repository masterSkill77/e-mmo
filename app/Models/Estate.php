<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    const IS_PUBLISH = 1;
    const IS_DRAFT = 0;
    const MONTHLY = "MONTHLY";
    const YEARLY = "YEARLY";
    const LOCATION = "À LOUER";
    const VENTE = "À VENDRE";

    use HasFactory;

    public function photos()
    {
        return $this->hasMany(Image::class);
    }

    public function scopeAgence(EloquentBuilder $query, int $agenceId)
    {
        $query->where('agence_id', $agenceId);
    }
}
