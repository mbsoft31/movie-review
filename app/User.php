<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mbsoft\Models\Movie;
use Mbsoft\Models\Review;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use InteractsWithMedia;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsername(){
        return $this->username;
    }

    public function reviews(){
        return $this->belongsToMany(Movie::class, 'reviews');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_user');
    }

    public function createMediaCollections(){
        $this->addMediaCollection('library');
    }
}
