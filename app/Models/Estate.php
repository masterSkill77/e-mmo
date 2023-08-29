<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Estate extends Model
{
    use HasFactory;
    const IS_PUBLISH = 1;
    const IS_DRAFT = 0;
    const MONTHLY = "MONTHLY";
    const YEARLY = "YEARLY";
    const LOCATION = "À LOUER";
    const VENTE = "À VENDRE";


    protected $fillable = [
        'title',
        'is_published',
        'price',
        'state',
        'paiement',
        'description',
        'agence_id',
        'localisation',
        'fb_published'
    ];

    public function photos()
    {
        return $this->hasMany(Image::class, 'imageable_id');
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'estate_id');
    }

    public function agence()
    {
        return $this->belongsTo(Agence::class, 'agence_id');
    }
    protected $casts = [
        'created_at' => 'date',
    ];
}
