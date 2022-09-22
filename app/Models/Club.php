<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'revisions', 'belongs'
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

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function getRevisionsAttribute()
    {
        return $this->revisions()
            ->where('user_id', auth()->user()->id)
            ->first();
    }
    public function getBelongsAttribute()
    {

        $user_clubs =  DB::table('user_clubs')
            ->where([['club_id', '=', $this->id], ['user_id', '=', auth()->user()->id]])
            ->count();

        if ($user_clubs >= 1) {
            return true;
        }
        return false;
    }
}
