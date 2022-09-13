<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'parent_id', 'body', 'club_id'];

    /**
     * @var array
     */

    protected $with = ['user', 'comments', 'images', 'club'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'liked', 'disliked', 'likeowner', 'dislikeowner', 'commentscount'
    ];


    public function getCommentsCountAttribute()
    {
        return $this->comments()
            ->count();
    }
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

    public function scopeAllPosts($query)
    {
        return $query->where('user_id', auth()->id())
            ->orWhereIn('user_id', auth()->user()->friends_ids());
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function images()
    {
        return $this->hasMany(PostImages::class);
    }
}
