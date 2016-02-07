<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'users';

    public $timestamps = false;

    public function movies() {
        return $this->belongsToMany('App\Movie', 'user_movie')->withPivot('user_id', 'status');
    }
}
