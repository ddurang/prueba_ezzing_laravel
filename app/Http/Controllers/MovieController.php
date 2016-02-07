<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Movie;

use Response;

class MovieController extends Controller
{
    // Mostrar todas las películas
     public function index() {
        return response()->json(['success'=>true, 'movies'=>Movie::all()], 200); 
    }

    // Creación de nueva película
    public function store(Request $request) {
               
        $nuevaPelicula = new Movie;

        $nuevaPelicula->imdb_id = $request->imdb_id;
        $nuevaPelicula->name = $request->name;

        $nuevaPelicula->save();

        $response = Response::make(json_encode(['data'=>$nuevaPelicula]), 201);
        return $response; 

    }
}
