<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        //un post pertenece a un usuario
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        //un post pertenece a una categoria
        return $this->belongsTo(Category::class);
    }

    //Metodos polimorficos

    public function comments(){
        //Un post tiene muchos comentarios
        return $this->morphMany(Comment::class, 'commentable'); //commentable_id y commentable_type
    }

    public function image(){
        //Un post tiene una imagen
        return $this->morphOne(Image::class, 'imageable');
    }

    public function tags(){
        //Un post tiene muchas etiquetas asi como una etiqueta tiene muchos posts
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
