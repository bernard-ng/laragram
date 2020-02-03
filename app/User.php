<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'username', 'password',];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = ['email_verified_at' => 'datetime',];

    protected static function boot(): void
    {
        parent::boot();
        static::created(function ($user) {
            $user->profile()->create([
                'title' => $user->username
            ]);
        });
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function posts(): HasMany
    {
        return $this
            ->hasMany(Post::class)
            ->orderBy('created_at', 'DESC');
    }
}
