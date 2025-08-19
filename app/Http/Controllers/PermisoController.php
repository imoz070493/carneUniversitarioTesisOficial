<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permiso;
use App\Http\Requests\PermisoFormRequest;

class PermisoController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $permisos = Permiso::listarPermisos($buscar, $criterio, $per_page);

        return [
            'pagination' => [
                'total' => $permisos->total(),
                'current_page' => $permisos->currentPage(),
                'per_page' => $permisos->perPage(),
                'last_page' => $permisos->lastPage(),
                'from' => $permisos->firstItem(),
                'to' => $permisos->lastItem(),
            ],
            'permisos' => $permisos
        ];
    }

    public function store(PermisoFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Permiso::guardarDatos($data);
    }

    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();
        $rol = $data['rol'];
        $activados = $data['activados'];
        $desactivados = $data['desactivados'];

        for ($i=0; $i < count($activados); $i++) {
            Permiso::asignarPermisoRol(['rol' => $rol, 'permiso' => $activados[$i]['name']]);
        }

        for ($i=0; $i < count($desactivados); $i++) {
            Permiso::desasignarPermisoRol(['rol' => $rol, 'permiso' => $desactivados[$i]['name']]);
        }

        return ['msg' => 'Actualizado correctamente'];
    }

    public function listarPermisos(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $permisos = Permiso::listarPermisosFull();

        return [
            'permisos' => $permisos
        ];
    }

    public function listarPermisosSelect(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        
        return Permiso::listarPermisosSelect();
    }
}
