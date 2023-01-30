<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'user_id',
        'lang_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function lang() {
        return $this->belongsTo(Language::class);
    }
}
