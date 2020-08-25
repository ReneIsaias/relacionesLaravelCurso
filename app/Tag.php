<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        //Una etiqueta tiene muchas post asi como una etiqueta tiene muchos post
        return $this->morphByMany(Post::class, 'taggable');
    }

    public function videos(){
        //Una etiqueta tiene muchos videos asi como una etiqueta tiene muchos videos
        return $this->morphByMany(Video::class, 'taggable');
    }
}
