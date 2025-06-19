<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }
}
