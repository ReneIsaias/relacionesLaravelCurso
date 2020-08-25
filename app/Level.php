<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function users()
    {
        //un nivel tiene muchos usuarios
        return $this->hasMany(User::class);
    }

    public function posts()
    {   //un nivel tiene muchos post atravez de usuario
        return $this->hasManyThrough(Post::class, User::class);
    }

    public function videos()
    {   //un nivel tiene muchos videos atravez de usuario
        return $this->hasManyThrough(Video::class, User::class);
    }
}
