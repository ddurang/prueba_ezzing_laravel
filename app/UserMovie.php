<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMovie extends Model
{
    //
    protected $table = 'user_movie';

    public $incrementing = false;

    public $timestamps = false;

    public function movie() {
        return $this->belongsToMany('App\Movie');
    }

    public function user() {
        return $this->belongsToMany('App\User');
    }

}
