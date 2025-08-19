<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Http\Requests\UsuarioFormRequest;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $usuarios = Usuario::listarUsuarios($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page' => $usuarios->perPage(),
                'last_page' => $usuarios->lastPage(),
                'from' => $usuarios->firstItem(),
                'to' => $usuarios->lastItem(),
            ],
            'usuarios' => $usuarios
        ];
    }

    public function store(UsuarioFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Usuario::guardarDatos($data);
    }

    public function update(UsuarioFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Usuario::guardarDatos($data);
    }
}
