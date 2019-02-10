<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $guarded = [];
    
    protected $fillable = ['title', 'description', 'content','user_id', 'picture'];

    public function user()
    {
        return $this->belogsTo(User::class);
    }
}
