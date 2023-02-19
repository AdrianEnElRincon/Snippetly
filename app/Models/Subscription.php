<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Subscription extends Pivot
{
    protected $table = 'subscriptions';

    protected $fillable = [
        'user_id',
        'community_id',
        'owner',
    ];

    protected $casts = [
        'owner' => 'boolean',
    ];
}
