<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserMovie;

use Response;

class UserMovieController extends Controller
{
    //
     public function index(Request $request, $user) {
        return response()->json(['success'=>true, 'data'=>UserMovie::where('user_id', $user)->get()], 200); 
    }

    // añadir pelicula al usuario
    public function store(Request $request, $user) {
        $nuevaSuscripcion = new UserMovie;
        $nuevaSuscripcion->user_id = $user;
        $nuevaSuscripcion->movie_id = $request->movie_id;
        $nuevaSuscripcion->status = "n";

        $nuevaSuscripcion->save();

        $response = Response::make(json_encode(['data'=>$nuevaSuscripcion]), 201);
        return $response; 
    }

    // modificar el status de la suscripcion
    public function update(Request $request, $user, $movie) {
        $nuevoEstado = $request->status;
        UserMovie::where('user_id', $user)->where('movie_id', $movie)->update(['status' => $nuevoEstado]);

        $response = Response::make(json_encode(['data'=>$nuevoEstado]), 200);
        return $response; 

    }

    // eliminar suscripcion
    public function destroy($user, $movie) {
        $suscripcionBorrada = UserMovie::where('user_id', $user)->where('movie_id', $movie)->delete();

        $response = Response::make(json_encode(['data'=>$suscripcionBorrada]), 204)
    }
}
