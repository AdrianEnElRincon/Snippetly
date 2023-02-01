<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'snippet_id',
        'user_id',
        'content',
    ];

    public function snippet()
    {
        return $this->hasOne(Snippet::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
