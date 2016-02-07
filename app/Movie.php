<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $table = 'movies';

    public $timestamps = false;

    public function usuario() {
        return $this->belongsToMany('App\User', 'user_movie')->withPivot('movie_id', 'status');
    }
}
