<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

// Rutas de la API

// Usuarios
Route::resource('users', 'UserController');

// Películas
Route::resource('movies', 'MovieController');

// Peliculas por usuario
Route::resource('users.movies', 'UserMovieController');

// Página de resultados
Route::get('/', function() {
    return view('index');
});

?>
