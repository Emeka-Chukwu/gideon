<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user()
    {
        $this->belongsTo(User::class,'users_id');
    }
}
