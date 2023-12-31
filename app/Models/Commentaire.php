<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        "contenu",
        "user_id",
        "estate_id",
        "email"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class, 'agence_id');
    }

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }
}
