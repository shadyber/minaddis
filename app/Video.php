<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //

    /**
     * @var array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|mixed|string
     */
    public function channels()
    {
        return $this->hasMany(History::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function Channel()
    {
        return $this->belongsTo(Channels::class);
    }
}
