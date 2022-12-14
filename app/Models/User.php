<?php

namespace App\Models;

use App\Traits\Friendable;
use App\Traits\Likeable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use Likeable;
    use Friendable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url', 'isfriendswith', 'friendrequestsentto', 'friendrequestrecievedfrom'
    ];

    // 'isFriendsWith', 'friendRequestSentTo', 'friendRequestRecievedFrom',

    /**
     * Undocumented function
     *
     * @var array
     */
    protected $with = ['profile'];

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return asset('/storage/assets/images/user/1.jpg');
    }

    public function scopeNotAuth()
    {
        return $this->where('id', '!=', auth()->id());
    }
    public function scopeSuggestions($query)
    {
        return $query->notAuth()->orWhereNotIn('id', auth()->user()->friends_ids());
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function clubs()
    {
        return $this->belongsToMany(Club::class, 'user_clubs')->withPivot('role_id');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'user_rooms');
    }
    public function revisions()
    {
        return $this->hasMany(Revision::class);
    }


    public function getIsFriendsWithAttribute()
    {
        if (auth()->user()) {
            return auth()->user()->is_friends_with($this->id);
        }
    }
    public function getFriendRequestSentToAttribute()
    {
        if (auth()->user()) {
            return auth()->user()->has_pending_friend_request_sent_to($this->id);
        }
    }
    public function getFriendRequestRecievedFromAttribute()
    {
        if (auth()->user()) {
            return auth()->user()->has_pending_friend_request_from($this->id);
        }
    }
}
