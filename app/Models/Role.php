<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = ['role_name', 'agence_id', 'permission'];
    // public $timestamps = false;

    public function scopeAgence(EloquentBuilder $query, int $agenceId)
    {
        return  $query->where("agence_id", $agenceId);
    }
}
