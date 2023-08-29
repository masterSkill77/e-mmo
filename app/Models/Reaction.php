<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;
    public $fillable = [
        'firebase_user',
        'estate_id'
    ];

    public function estate()
    {
        return $this->belongsTo(Estate::class, 'estate_id');
    }
}
