<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Http\Resources\Usuario as UsuarioResource;
use App\Http\Resources\UsuarioCollection;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        // return new UsuarioCollection(Usuario::join('departamentos', 'departamentos.id', '=', 'iddepartamento')->join('municipios', 'municipios.id', '=', 'idmunicipio')->orderBy('nombreDep')->orderBy('nombreMun')->select('terceros.*')->get());
        return new UsuarioCollection(Usuario::all());
    }

    public function show($id)
    {
        return new UsuarioResource(Usuario::findOrFail($id));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Apellido' => 'required|max:255',
            'Telefono' => 'max:255',
            'Mail' => 'max:255',
            'Direccion' => 'max:255',
        ]);

        $usuario = Usuario::create($request->all());

        return (new UsuarioResource($usuario))
             ->response()
             ->setStatusCode(201);
    }

    public function delete($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(null, 204);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nombre' => 'required|max:255',
            'Apellido' => 'required|max:255',
            'Telefono' => 'max:255',
            'Mail' => 'max:255',
            'Direccion' => 'max:255',
         ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->Nombre = $request->get('Nombre');
        $usuario->Apellido = $request->get('Apellido');
        $usuario->Telefono = $request->get('Telefono');
        $usuario->Mail = $request->get('Mail');
        $usuario->Direccion = $request->get('Direccion');
        $usuario->save();

        return response()->json(null, 201);
    }
}
