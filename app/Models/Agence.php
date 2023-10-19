<?php

namespace App\Models;

use App\Trait\OneTimeToken;
use App\Trait\UseMailFromAgence;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Agence extends Model
{

    use HasFactory, HasApiTokens, OneTimeToken;

    protected $fillable = [
        'agence_name',
        'agence_phone',
        'agence_adresse',
        'agence_mail',
        'active',
        'agence_site_url',
        'agence_logo',
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
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'agence_id');
    }
}
