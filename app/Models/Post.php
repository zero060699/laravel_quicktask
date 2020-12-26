<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    protected $fillable = [
        'name',
        'detail',
        'author',
        'user_id',
    ];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
