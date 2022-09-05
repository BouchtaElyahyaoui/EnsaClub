<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'post_id', 'body'];
    /**
     * 
     * @var array
     */
    protected $with = ['user'];
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'liked', 'disliked', 'likeowner', 'dislikeowner'
    ];

    public function getLikedAttribute()
    {
        return $this->likes()->where('like', 1)
            ->where('likeable_id', $this->id)
            ->where('likeable_type', get_class($this))
            ->count();
    }

    public function getdislikedAttribute()
    {
        return $this->likes()->where('dislike', 1)
            ->where('likeable_id', $this->id)
            ->where('likeable_type', get_class($this))
            ->count();
    }
    public function getLikeOwnerAttribute()
    {
        return $this->likes()->where('like', 1)
            ->where('likeable_id', $this->id)
            ->where('user_id', auth()->user()->id)
            ->where('likeable_type', get_class($this))
            ->first();
    }
    public function getDislikeOwnerAttribute()
    {
        return $this->likes()->where('dislike', 1)
            ->where('likeable_id', $this->id)
            ->where('user_id', auth()->user()->id)
            ->where('likeable_type', get_class($this))
            ->first();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
