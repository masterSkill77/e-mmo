<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    use HasFactory;
    public $table = "accesss";
    protected $fillable = ['access_token', 'token_owner_id', 'type'];
}
