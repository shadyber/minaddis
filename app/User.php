<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function channels()
    {
        return $this->hasMany(Channels::class);
    }
    public function history()
    {
        return $this->hasMany(History::class);
    }
    public function subscribtion()
    {
        return $this->hasMany(Subscribtion::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
