<?php

namespace App\Models;

use App\Trait\UseMailFromAgence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agence extends Model
{

    use HasFactory, UseMailFromAgence;

    protected $fillable = [
        'agence_name',
        'agence_phone',
        'agence_adresse',
        'agence_mail',

        'active',
        'agence_site_url',

        'agence_logo_id',
        'password',
        'responsable_name'
    ];

    public function estates()
    {
        return $this->hasMany(Estate::class, 'agence_id');
    }

    public function photos()
    {
        return $this->hasMany(Image::class, 'imageable_id');
    }
}
