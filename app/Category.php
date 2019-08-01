<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    // // category relationship with articles
    public function articles()
    {
        return $this->hasMany(Article::class,'categories_id');
    }
}
