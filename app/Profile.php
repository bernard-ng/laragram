<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{

    protected $fillable = ['title', 'description', 'url'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
