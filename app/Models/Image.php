<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'image_path',
        'image_extension',
        'image_type',
        'imageable_type',
        'imageable_id',
    ];
}
