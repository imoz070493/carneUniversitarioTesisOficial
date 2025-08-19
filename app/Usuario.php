<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // protected $table = 'users';

    // protected $primaryKey = 'id';

    // protected $fillable = [
    //     'name',
    // 	'email',
    // 	'password',
    // 	'estado'
    // ];

    public static function guardarDatos($datos){
        $data = [];

        if (array_key_exists('name', $datos)) $data['name'] = $datos['name'];
        if (array_key_exists('usuario', $datos)) $data['usuario'] = $datos['usuario'];
        if (array_key_exists('email', $datos)) $data['email'] = $datos['email'];

        if (array_key_exists('password', $datos)) {
            if($datos['password'])
                $data['password'] = bcrypt($datos['password']);
        }


        if (array_key_exists('estado', $datos)) $data['estado'] = $datos['estado'];

        $role = Rol::findOrFail($datos['role_id']);

        if(isset($datos['id'])){
            $usuario = User::findOrFail($datos['id']);
            $usuario->update($data);

            $roles = $usuario->getRoleNames();
            for ($i=0; $i < count($roles); $i++) { 
                $usuario->removeRole($roles[$i]);
            }
            $usuario->assignRole($role->name);
        }else{
            $usuario = new User();
            $usuario->create($data);
            $usuario->assignRole($role->name);
        }



        return 2;
    }

    public static function listarUsuarios($buscar='', $criterio='nombre', $per_page='5'){
        /**
         * TODO: 
         * _FALTA HACER UN JOIN CON LA TABLA PRECIO VENTA QUE SE CREARA MAS ADELANTE
         * _Falta implementar el filtro de busqueda
         */
        $users = User::select(
                                'users.id',
                                'users.name',
                                'users.email',
                                'users.estado'
                            );

            if($buscar!=''){
                $users = $users->where($criterio,'like','%'.$buscar.'%');
            }

        $users = $users->with('roles')
                                ->orderBy('id','desc')
                                ->paginate($per_page);

        return $users;
    }

}
