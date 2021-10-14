<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuario;

class UsuarioController extends Controller
{
    public function store(StoreUsuario $request)
    {

        $data = request()->get('data');
        $doc = $request  -> documento;
        $nombres = $request -> nombres;
        $apellidos = $request -> apellidos;
        $telefono = $request -> telefono;
        $correo = $request -> correo;
        $cuidad = $request -> cuidad;
        $direccion = $request -> direccion;
        $password = $request ->password;
        $encryptedPassword = bcrypt($password);

        $usuario = new Usuario();
        $usuario -> doc = $doc;
        $usuario -> nombres = $nombres;
        $usuario -> apellidos = $apellidos;
        $usuario -> telefono = $telefono;
        $usuario -> correo = $correo;
        $usuario -> cuidad = $cuidad;
        $usuario -> direccion = $direccion;
        $usuario -> password = $encryptedPassword;

        $usuario -> save();

        return response()->json($data);
        //dd($request);

       /* $validator = Validator::make($request->all(), [
            'documento' => 'required|integer|min:7|unique:App\Models\Usuario,doc',
            'nombres' => 'required|string|min:3',
            'apellidos' => 'required|string|min:3',
            'telefono' => 'required|integer|min:10',
            'correo' => "required|regex:/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/|unique:App\Models\Usuario,correo",
            'cuidad' => 'required|string|min:3',
            'direccion' => 'required|min:3',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $new = Study::create($request->all());

        return response()->json($new, 201);**/
    }
}
