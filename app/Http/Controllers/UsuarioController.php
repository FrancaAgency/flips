<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        $doc = $request  -> documento;
        $nombres = $request -> nombres;
        $apeliidos = $request -> apellidos;
        $telefono = $request -> telefono;
        $correo = $request -> correo;
        $cuidad = $request -> cuidad;
        $direccion = $request -> direccion;
        $password = $request ->password;
    }
}
