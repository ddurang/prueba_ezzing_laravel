<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creación de las tablas

        // usuarios
        Schema::create('users', function (Blueprint $tabla) {
            $tabla -> integer('id');
            $tabla -> primary('id');
            $tabla -> string('username', 255);
            $tabla -> string('password', 255);
        });

        // películas
        Schema::create('movies', function (Blueprint $tabla) {
            $tabla -> integer('id');
            $tabla -> primary('id');
            $tabla -> string('imdb_id', 255);
            $tabla -> string('name', 255);
        });

        // subscripciones de usuarios a películas
        Schema::create('user_movie', function(Blueprint $tabla) {
            $tabla -> integer('user_id');
            $tabla -> foreign('user_id') -> references('id') -> on('users');
            $tabla -> integer('movie_id');
            $tabla -> foreign('movie_id') -> references('id') -> on('movies');
            $tabla -> char('status', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
