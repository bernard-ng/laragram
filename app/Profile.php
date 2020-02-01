<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Profile
 * @package App
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class Profile extends Model
{

    /**
     * @return BelongsTo
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
