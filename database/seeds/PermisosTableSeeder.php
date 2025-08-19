<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * 1. cada_vez que se ejecuta que queremos limpiar
         *      la tabla de permisos
         *      para eliminar ejecutamos el siguiente comando:
         *      php artisan permission:cache-reset
         * 
         * 2. Asignamos el permiso creado al usuario admin
         */

        $array_permisos=[
            // ["grupo"=>"seguridad","modulo"=>"super","accion"=>"admin"],

            ["modulo"=>"super","accion"=>"admin"],

            ["modulo"=>"dashboard_estudiante","accion"=>"listar"],
            ["modulo"=>"dashboard_estudiante","accion"=>"nuevo"],
            ["modulo"=>"dashboard_estudiante","accion"=>"editar"],
            ["modulo"=>"dashboard_estudiante","accion"=>"eliminar"],

            ["modulo"=>"inscritos","accion"=>"listar"],
            ["modulo"=>"inscritos","accion"=>"nuevo"],
            ["modulo"=>"inscritos","accion"=>"editar"],
            ["modulo"=>"inscritos","accion"=>"eliminar"],

            ["modulo"=>"historicos","accion"=>"listar"],
            ["modulo"=>"historicos","accion"=>"nuevo"],
            ["modulo"=>"historicos","accion"=>"editar"],
            ["modulo"=>"historicos","accion"=>"eliminar"],

            ["modulo"=>"matriculas","accion"=>"listar"],
            ["modulo"=>"matriculas","accion"=>"nuevo"],
            ["modulo"=>"matriculas","accion"=>"editar"],
            ["modulo"=>"matriculas","accion"=>"eliminar"],

            ["modulo"=>"cargas","accion"=>"listar"],
            ["modulo"=>"cargas","accion"=>"nuevo"],
            ["modulo"=>"cargas","accion"=>"editar"],
            ["modulo"=>"cargas","accion"=>"eliminar"],










            // ["modulo"=>"articulo","accion"=>"listar"],
            // ["modulo"=>"articulo","accion"=>"nuevo"],
            // ["modulo"=>"articulo","accion"=>"editar"],
            // ["modulo"=>"articulo","accion"=>"eliminar"],

            // ["modulo"=>"categoria","accion"=>"listar"],
            // ["modulo"=>"categoria","accion"=>"nuevo"],
            // ["modulo"=>"categoria","accion"=>"editar"],
            // ["modulo"=>"categoria","accion"=>"eliminar"],

            // ["modulo"=>"caja","accion"=>"listar"],
            // ["modulo"=>"caja","accion"=>"nuevo"],
            // ["modulo"=>"caja","accion"=>"editar"],
            // ["modulo"=>"caja","accion"=>"eliminar"],

            // ["modulo"=>"ingreso","accion"=>"listar"],
            // ["modulo"=>"ingreso","accion"=>"nuevo"],
            // ["modulo"=>"ingreso","accion"=>"editar"],
            // ["modulo"=>"ingreso","accion"=>"eliminar"],

            // ["modulo"=>"proveedor","accion"=>"listar"],
            // ["modulo"=>"proveedor","accion"=>"nuevo"],
            // ["modulo"=>"proveedor","accion"=>"editar"],
            // ["modulo"=>"proveedor","accion"=>"eliminar"],

            // ["modulo"=>"venta","accion"=>"listar"],
            // ["modulo"=>"venta","accion"=>"nuevo"],
            // ["modulo"=>"venta","accion"=>"editar"],
            // ["modulo"=>"venta","accion"=>"eliminar"],
            // ["modulo"=>"venta","accion"=>"activar"],

            // ["modulo"=>"traslado","accion"=>"listar"],
            // ["modulo"=>"traslado","accion"=>"nuevo"],
            // ["modulo"=>"traslado","accion"=>"editar"],
            // ["modulo"=>"traslado","accion"=>"eliminar"],

            // ["modulo"=>"ventacredito","accion"=>"listar"],
            // ["modulo"=>"ventacredito","accion"=>"nuevo"],
            // ["modulo"=>"ventacredito","accion"=>"editar"],
            // ["modulo"=>"ventacredito","accion"=>"eliminar"],

            // ["modulo"=>"cliente","accion"=>"listar"],
            // ["modulo"=>"cliente","accion"=>"nuevo"],
            // ["modulo"=>"cliente","accion"=>"editar"],
            // ["modulo"=>"cliente","accion"=>"eliminar"],

            // ["modulo"=>"rol","accion"=>"listar"],
            // ["modulo"=>"rol","accion"=>"nuevo"],
            // ["modulo"=>"rol","accion"=>"editar"],
            // ["modulo"=>"rol","accion"=>"eliminar"],

            // ["modulo"=>"permiso","accion"=>"listar"],
            // ["modulo"=>"permiso","accion"=>"nuevo"],
            // ["modulo"=>"permiso","accion"=>"editar"],
            // ["modulo"=>"permiso","accion"=>"eliminar"],

            // ["modulo"=>"usuario","accion"=>"listar"],
            // ["modulo"=>"usuario","accion"=>"nuevo"],
            // ["modulo"=>"usuario","accion"=>"editar"],
            // ["modulo"=>"usuario","accion"=>"eliminar"],

            // ["modulo"=>"reportecompra","accion"=>"listar"],
            // ["modulo"=>"reportecompra","accion"=>"nuevo"],
            // ["modulo"=>"reportecompra","accion"=>"editar"],
            // ["modulo"=>"reportecompra","accion"=>"eliminar"],

            // ["modulo"=>"reporteventa","accion"=>"listar"],
            // ["modulo"=>"reporteventa","accion"=>"nuevo"],
            // ["modulo"=>"reporteventa","accion"=>"editar"],
            // ["modulo"=>"reporteventa","accion"=>"eliminar"],

            // ["modulo"=>"reporteinventario","accion"=>"listar"],
            // ["modulo"=>"reporteinventario","accion"=>"nuevo"],
            // ["modulo"=>"reporteinventario","accion"=>"editar"],
            // ["modulo"=>"reporteinventario","accion"=>"eliminar"],

            // ["modulo"=>"empresa","accion"=>"listar"],
            // ["modulo"=>"empresa","accion"=>"nuevo"],
            // ["modulo"=>"empresa","accion"=>"editar"],
            // ["modulo"=>"empresa","accion"=>"eliminar"],

            // ["modulo"=>"almacen","accion"=>"listar"],
            // ["modulo"=>"almacen","accion"=>"nuevo"],
            // ["modulo"=>"almacen","accion"=>"editar"],
            // ["modulo"=>"almacen","accion"=>"eliminar"],

            // ["modulo"=>"periodo","accion"=>"listar"],
            // ["modulo"=>"periodo","accion"=>"nuevo"],
            // ["modulo"=>"periodo","accion"=>"editar"],
            // ["modulo"=>"periodo","accion"=>"eliminar"],

            // ["modulo"=>"banco","accion"=>"listar"],
            // ["modulo"=>"banco","accion"=>"nuevo"],
            // ["modulo"=>"banco","accion"=>"editar"],
            // ["modulo"=>"banco","accion"=>"eliminar"],
        ];

        $array_roles = ['administrador','encargado', 'estudiante'];

        // CREAR ROLES
        for ($i=0;$i<count($array_roles);$i++) {
            try {
                Role::create([
                    'name'=> strtolower($array_roles[$i])
                    ]);
            } catch (\Exception $e) {
                Log::info($e);
                continue;
            }
        }

        // CREAR PERMISOS
        for ($i=0;$i<count($array_permisos);$i++) {
            try {
                Permission::create([
                    'name'=> strtolower($array_permisos[$i]['modulo'])."_".strtolower($array_permisos[$i]['accion']),
                    'modulo'=> strtolower($array_permisos[$i]['modulo']),
                    'regla'=> strtolower($array_permisos[$i]['accion']),
                    ]);
            } catch (\Exception $e) {
                Log::info($e);
                continue;
            }
        }

        // ASIGNAR PERMISO ADMINISTRADOR
        $role = Role::findByName('administrador');
        $array_permisos_superadmin = static::PermisosSuperAdmin();
        for ($i=0;$i<count($array_permisos_superadmin);$i++) {
            try {
                $role->givePermissionTo($array_permisos_superadmin[$i]['modulo']."_".$array_permisos_superadmin[$i]['accion']);
            } catch (\Exception $e) {
                Log::info($e);
                continue;
            }
        }

        // ASIGNAR PERMISO VENDEDOR
        $role = Role::findByName('estudiante');
        $array_permisos_estudiante = static::permisosEstudiante();
        for ($i=0;$i<count($array_permisos_estudiante);$i++) {
            try {
                $role->givePermissionTo($array_permisos_estudiante[$i]['modulo']."_".$array_permisos_estudiante[$i]['accion']);
            } catch (\Exception $e) {
                Log::info($e);
                continue;
            }
        }

    }

    public static function permisosSuperAdmin(){
        return [
            ["modulo"=>"super","accion"=>"admin"],

            // ["modulo"=>"dashboard_estudiante","accion"=>"listar"],
            // ["modulo"=>"dashboard_estudiante","accion"=>"nuevo"],
            // ["modulo"=>"dashboard_estudiante","accion"=>"editar"],
            // ["modulo"=>"dashboard_estudiante","accion"=>"eliminar"],

            ["modulo"=>"inscritos","accion"=>"listar"],
            ["modulo"=>"inscritos","accion"=>"nuevo"],
            ["modulo"=>"inscritos","accion"=>"editar"],
            ["modulo"=>"inscritos","accion"=>"eliminar"],

            ["modulo"=>"historicos","accion"=>"listar"],
            ["modulo"=>"historicos","accion"=>"nuevo"],
            ["modulo"=>"historicos","accion"=>"editar"],
            ["modulo"=>"historicos","accion"=>"eliminar"],

            ["modulo"=>"matriculas","accion"=>"listar"],
            ["modulo"=>"matriculas","accion"=>"nuevo"],
            ["modulo"=>"matriculas","accion"=>"editar"],
            ["modulo"=>"matriculas","accion"=>"eliminar"],

            ["modulo"=>"cargas","accion"=>"listar"],
            ["modulo"=>"cargas","accion"=>"nuevo"],
            ["modulo"=>"cargas","accion"=>"editar"],
            ["modulo"=>"cargas","accion"=>"eliminar"],
        ];
    }

    public static function permisosEstudiante(){
        return [
            ["modulo"=>"dashboard_estudiante","accion"=>"listar"],
            ["modulo"=>"dashboard_estudiante","accion"=>"nuevo"],
            ["modulo"=>"dashboard_estudiante","accion"=>"editar"],
            ["modulo"=>"dashboard_estudiante","accion"=>"eliminar"],
        ];
    }
}
