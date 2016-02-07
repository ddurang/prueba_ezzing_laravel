<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller
{
    //
    public function index() {

        return response()->json(['success'=>true, "users"=>User::with('movies')->get()], 200); 
    }
}
