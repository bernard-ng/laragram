<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    protected $fillable = ['caption', 'image', 'title'];

    /**
     * @return BelongsTo
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
