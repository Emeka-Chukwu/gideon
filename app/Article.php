<?php

namespace App;
use Nicolaslopezj\Searchable\SearchableTrait;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{   
    use SearchableTrait;

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'articles.title' => 10,
            'articles.body' => 8,
            'users.name' => 6,
           
            // 'users.name' => 4,
            // 'posts.body' => 1,
        ],
        
        'joins' => [
            'users' => ['users.id','articles.user_id'],
        ],
    ];
    protected $fillable = ['commentable_type','commentable_id','user_id','body','categories_id'];
    // Article relationship with Category
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

     // Article relationship with user

    public function user()
    {
        return $this->belongsTo(User::class);
    }

     // Article relationship with comments
 
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->whereNull('parent_id');
    }
    public function comment()
    {
        $this->hasMany('App\Article','commentable_id');
    }
}
