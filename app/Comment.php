<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable(){
        //cambiar a
        return $this->morphTo();
    }

    public function user()
    {
        //un commentario pertenece a un usuario
        return $this->belongsTo(User::class); //user_id
    }
}
