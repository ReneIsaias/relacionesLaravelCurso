<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function user()
    {
        //un video pertenece a un usuario
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        //un video pertenece a una categoria
        return $this->belongsTo(Category::class);
    }

    //Metodos polimorficos

    public function comments(){
        //Un video tiene muchos comentarios
        return $this->morphMany(Comment::class, 'commentable'); //commentable_id y commentable_type
    }

    public function image(){
        //Un video tiene una imagen
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags(){
        //Un video tiene muchas etiquetas asi como una etiqueta tiene muchos video
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
