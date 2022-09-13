<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;
    protected $fillable = ['clubName', 'mission', 'description', 'slug', 'dateOfCreation', 'ClubImage'];

    protected $with = ['users'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'revisions',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_clubs')->withPivot('role_id');
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function revisions()
    {
        return $this->hasMany(Revision::class);
    }

    public function getRevisionsAttribute()
    {
        return $this->revisions()
            ->where('user_id', auth()->user()->id)
            ->first();
    }
}
