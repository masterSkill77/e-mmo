<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    const LOGO = "LOGO";
    const ILLUSTRATION = "ILLUSTRATION";
    public $timestamps = false;
    protected $fillable = [
        'image_path',
        'image_extension',
        'image_type',
        'imageable_type',
        'imageable_id',
    ];

    public function estate()
    {
        return $this->morphTo(Estate::class, 'imageable_id');
    }
}
