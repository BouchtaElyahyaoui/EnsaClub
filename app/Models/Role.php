<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['roleName'];

    public function user_clubs()
    {
        return $this->hasMany(UserClub::class);
    }
}
