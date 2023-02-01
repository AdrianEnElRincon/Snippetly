<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'public',
        'preferences',
    ];

    protected $casts = [
        'public' => 'boolean',
        'preferences' => 'object'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
