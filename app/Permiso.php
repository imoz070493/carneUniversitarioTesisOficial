<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permiso extends Model
{
    protected $table = 'permissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    	'guard_name'
    ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('name', $datos)) $data['name'] = $datos['name'];
        

        if(isset($datos['id'])){
            $role = Permiso::findOrFail($datos['id']);
            $role->update($data);
        }else{
            $role = Permission::create($data);
        }

        return $role;
    }

    public static function asignarPermisoRol($datos){
        
        $role = Role::findByName($datos['rol']);

        $role->givePermissionTo($datos['permiso']);

        return $role;
    }

    public static function desasignarPermisoRol($datos){
        
        $role = Role::findByName($datos['rol']);

        $role->revokePermissionTo($datos['permiso']);

        return $role;
    }

    public static function listarPermisos($buscar='', $criterio='nombre', $per_page='5'){
        /**
         * TODO:
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */

        $roles = Rol::with(['permisos' => function ($query) {
            $query->select('id', 'name as name_permission');
        }]);

        // $roles = $roles->get();
        $roles = $roles->paginate($per_page);

        return $roles;
    }

    public static function listarPermisosFull(){
        $permisos = Permiso::get();

        $collection = collect($permisos);
        $grouped = $collection->groupBy('modulo');
        $grouped = $grouped->toArray();

        return $grouped;
    }

    public static function listarPermisosSelect(){

        $roles = Permission::select('id','name')->orderBy('id','asc')->get();

        return $roles;
    }
}
