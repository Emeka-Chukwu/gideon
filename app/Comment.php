<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model

{   
    //  protected $fillable = [];
    // the relationship of the user and his comments
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship of comments 
    public function replies()
    {
        return $this->hasMany(Comment::class,'parent_id');
        
    }

    public function commentable()
    {
        return $this->morphTo();
    }

  

    public function articles()
    {
        $this->belongsTo('App\Article');
    }
}
