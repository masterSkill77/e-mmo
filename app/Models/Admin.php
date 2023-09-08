<?php

namespace App\Models;

use App\Trait\OneTimeToken;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, OneTimeToken;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public $timestamps = false;
}
