<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function location()
    {
        //Un perfil tiene una localizacion
        return $this->hasOne(Location::class);
    }
}
