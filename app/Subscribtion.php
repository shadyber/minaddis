<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{
    //
    public function Channel()
    {
        return $this->belongsTo(Channels::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
