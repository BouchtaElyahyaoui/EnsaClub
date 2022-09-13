<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'club_id', 'text'];






    public function club()
    {
        $this->belongsTo(Club::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
