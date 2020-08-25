<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function imageable(){
        //uno a uo
        return $this->morphTo();
    }
}
