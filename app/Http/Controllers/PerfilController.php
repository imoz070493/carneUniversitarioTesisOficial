<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;
use App\Http\Requests\PerfilFormRequest;
use App\Http\Requests\PerfilModalFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar = $request->buscar;
        $criterio = $request->criterio;
        $per_page = $request->per_page;

        $perfiles = Perfil::listarPerfiles($buscar, $criterio, $per_page);

        return [
            'perfiles' => $perfiles,
        ];
    }



    public function obtenerPerfil(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $perfil = Perfil::obtenerPerfil();
        $permisos = static::formatearPermisos(auth()->user()->getAllPermissions());

        return [
            'perfil' => $perfil,
            'permisos' => $permisos
        ];
    }

    public static function formatearPermisos($permisos){
        $array_permisos = [];

        foreach ($permisos as $key => $value) {
            array_push($array_permisos,$value->name);
        }

        return $array_permisos;
    }

    public function store(PerfilFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        return Perfil::guardarDatos($data);
    }

    public function update(PerfilFormRequest $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();

        try{
            DB::beginTransaction();
            if($data['estado'] == 'activo'){
                Perfil::desactivarPerfil();
            }

            if($data['estado'] == 'inactivo'){
                Perfil::activarPerfil();
            }

            $perfil = Perfil::guardarDatos($data);
            DB::commit();
            
            return $perfil;
    	}catch(\Exception $e){
			DB::rollback();
            \Log::info($e);
            return response()->json([
                'message' => 'No se puede actualizar el perfil',
                'error' => $e
            ], 500);
    	}

    }

    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();
        $data['estado'] = 'inactivo';

        return Articulo::guardarDatos($data);
    }

    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $data = $request->all();
        $data['estado'] = 'activo';
        
        return Articulo::guardarDatos($data);
    }

    public function actualizarPassword(PerfilModalFormRequest $request){
        if(!$request->ajax()) return redirect('/');
        // Actualizar contraseña
        $user = \Auth::user();

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Contraseña actualizada correctamente'
        ]);
    }
}
