<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Friendable;

class Friend extends Model
{
    use HasFactory;
    protected $fillable = ['requester', 'user_requested', 'status'];
}
