<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'content','user_id', 'picture'];

    public function user()
    {
        return $this->belogsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category','category_posts','post_id','category_id');
    }
}
