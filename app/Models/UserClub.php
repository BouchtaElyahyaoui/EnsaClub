<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserClub extends Model
{
    use HasFactory;

    protected $with = ['role'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
