<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['clubName', 'mission', 'description', 'slug', 'dateOfCreation', 'ClubImage'];

    protected $with = ['users',];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_clubs')->withPivot('role_id');
    }
}
