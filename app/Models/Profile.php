<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'style',
        'public'
    ];

    protected $casts = [
        'public' => 'boolean'
    ];

    function user() {
        return $this->belongsTo(User::class);
    }
}
