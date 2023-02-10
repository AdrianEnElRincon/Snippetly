<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'owner'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->using(Subscription::class);
    }

    public function snippets()
    {
        return $this->hasMany(Snippet::class);
    }
}
