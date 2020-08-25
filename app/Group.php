<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    public function users()
    {
        //un grupo pertenece a uno o muchos usuarios
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
