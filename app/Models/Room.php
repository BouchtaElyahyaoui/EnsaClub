<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'roomImage'];

    protected $with = ['users'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'belongs'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_rooms');
    }

    public function getBelongsAttribute()
    {

        $user_rooms =  DB::table('user_rooms')
            ->where([['room_id', '=', $this->id], ['user_id', '=', auth()->user()->id]])
            ->count();

        if ($user_rooms >= 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
