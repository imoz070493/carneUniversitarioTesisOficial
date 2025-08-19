<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Http\Requests\RolFormRequest;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $roles = Rol::listarRoles($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $roles->total(),
                'current_page' => $roles->currentPage(),
                'per_page' => $roles->perPage(),
                'last_page' => $roles->lastPage(),
                'from' => $roles->firstItem(),
                'to' => $roles->lastItem(),
            ],
            'roles' => $roles
        ];
    }

    public function store(RolFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Rol::guardarDatos($data);
    }

    public function update(RolFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Rol::guardarDatos($data);
    }

    public function listarRolesSelect(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        
        return Rol::listarRolesSelect();
    }
}
