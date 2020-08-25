<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function profile()
    {
        //un usuario tiene un solo perfil
        return $this->hasOne(Profile::class);
    }

    public function level()
    {
        //un usuario pertenece a un nivel
        return $this->belongsTo(Level::class);
    }

    public function groups()
    {
        //un usuario pertenece a uno o muchos grupos
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    public function location()
    {   //un usuario tiene una localizacion a travez de perfil
        return $this->hasOneThrough(Location::class, Profile::class);
    }

    public function posts()
    {
        //un usuario tiene muchos posts
        return $this->hasMany(Post::class);
    }

    public function videos()
    {
        //un usuario tiene muchos videos
        return $this->hasMany(Video::class);
    }

    public function comments()
    {
        //un usuario tiene muchos cometarios
        return $this->hasMany(Comment::class);
    }

    public function image()
    {
        //un usuario tiene una imagen
        return $this->morphOne(Image::class, 'imageable');
    }
}
