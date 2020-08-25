<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function posts()
    {
        //una categoria tiene muchos posts
        return $this->hasMany(Post::class);
    }

    public function videos()
    {
        //una categoria tiene muchos videos
        return $this->hasMany(Video::class);
    }
}
