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
        'agence_status',
        'agence_mail',
        'agence_sender_mail',
        'agence_smtp_host',
        'active',
        'agence_site_url',
        'agence_smtp_port',
        'agence_smtp_username',
        'agence_logo_id',
        'agence_smtp_password',
        'responsable_id'
    ];
    public function responsable(): BelongsTo
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }

    public function estates()
    {
        return $this->hasMany(Estate::class, 'agence_id');
    }

    public function photos()
    {
        return $this->hasMany(Image::class, 'imageable_id');
    }
}
