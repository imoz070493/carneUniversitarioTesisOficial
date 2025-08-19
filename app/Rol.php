<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Rol extends Role
{
    protected $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
    	'guard_name'
    ];

    public function permisos()
    {
        return $this->belongsToMany(
            'App\Permiso',
            'role_has_permissions',
            'role_id',
            'permission_id'
        );
    }

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('name', $datos)) $data['name'] = $datos['name'];
        

        if(isset($datos['id'])){
            $role = Rol::findOrFail($datos['id']);
            $role->update($data);
        }else{
            $role = Role::create($data);
        }

        return $role;
    }

    public static function listarRoles($buscar='', $criterio='nombre', $per_page='5'){
        /**
         * TODO:
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        return Role::paginate($per_page);
    }

    public static function listarRolesSelect(){

        $roles = Role::select('id','name')->orderBy('id','asc')->get();

        return $roles;
    }
}
