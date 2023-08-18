<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public const PENDING = "pending";
    public const CURRENT = "current";
    protected $table = "staffs";
    use HasFactory;
    protected $fillable = ['user_id', 'agence_id', 'role_id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
