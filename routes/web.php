<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(["register" => false, 'verify' => true]);

Route::get('/', function () {
    if(Auth::guest()){
		return view('auth/login');
	}else{
        // return redirect('contenido/contenido');
        return view('contenido/contenido');
	}
});

use App\Http\Controllers\CustomVerifyController;

Route::get('/verify-email/{id}/{hash}', [CustomVerifyController::class, 'verify'])
    ->middleware('signed') // SIN 'auth'
    ->name('custom.verify');


// Route::Auth(["register" => false]);
// Route::Auth();
// Auth::routes(["register" => false]);
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reload', function () {
    return view('contenido/reload');
})->name('reload');
// Route::group(['middleware' => ['permission:categoria_listar']], function () {
    Route::get('/persona_dni','PersonaDniController@index');
    Route::post('/persona_dni/registrar','PersonaDniController@store');
    Route::put('/persona_dni/actualizar','PersonaDniController@update');
    Route::post('/persona_dni/importar','PersonaDniController@importar');
    Route::post('/persona_dni/plantilla','PersonaDniController@descargarPlantilla');
    // Route::put('/persona_dni/desactivar','PersonaDniController@desactivar');
    // Route::put('/persona_dni/activar','PersonaDniController@activar');
// });

// Route::group(['middleware' => ['permission:categoria_listar']], function () {
    Route::get('/empresa','EmpresaController@index');
    Route::post('/empresa/registrar','EmpresaController@store');
    Route::put('/empresa/actualizar','EmpresaController@update');
    // Route::put('/empresa/desactivar','EmpresaController@desactivar');
    // Route::put('/empresa/activar','EmpresaController@activar');
// });

Route::get('/acceso','AccesoController@index');
Route::post('/acceso/registrar','AccesoController@store');
Route::put('/acceso/actualizar','AccesoController@update');

Route::get('/role','RoleController@index');
Route::post('/role/registrar','RoleController@store');
Route::put('/role/actualizar','RoleController@update');
Route::get('/role/select','RoleController@listarRolesSelect');
// Route::put('/role/desactivar','RoleController@desactivar');
// Route::put('/role/activar','RoleController@activar');

Route::get('/permiso','PermisoController@index');
Route::post('/permiso/registrar','PermisoController@store');
Route::put('/permiso/actualizar','PermisoController@update');
Route::get('/permiso/listar_permiso','PermisoController@listarPermisos');
// Route::get('/permiso/select','PermisoController@listarPermisosSelect');
// Route::put('/permiso/desactivar','PermisoController@desactivar');
// Route::put('/permiso/activar','PermisoController@activar');

Route::get('/usuario','UsuarioController@index');
Route::post('/usuario/registrar','UsuarioController@store');
Route::put('/usuario/actualizar','UsuarioController@update');
// Route::put('/usuario/desactivar','UsuarioController@desactivar');
// Route::put('/usuario/activar','UsuarioController@activar');

// Route::group(['middleware' => ['permission:categoria_listar']], function () {
    Route::get('/cliente','ClienteController@index');
    Route::post('/cliente/registrar','ClienteController@store');
    Route::put('/cliente/actualizar','ClienteController@update');
    // Route::put('/cliente/desactivar','ClienteController@desactivar');
    // Route::put('/cliente/activar','ClienteController@activar');
// });

// Route::group(['middleware' => ['permission:categoria_listar']], function () {
    Route::post('/consulta_documento','ConsultaDocumentoController@index');
    // Route::post('/consulta_documento/registrar','ConsultaDocumentoController@store');
    // Route::put('/consulta_documento/actualizar','ConsultaDocumentoController@update');
    // Route::put('/consulta_documento/desactivar','ConsultaDocumentoController@desactivar');
    // Route::put('/consulta_documento/activar','ConsultaDocumentoController@activar');
// });

// Route::group(['middleware' => ['permission:categoria_listar']], function () {
    Route::post('/consulta_cpe','ConsultaCpeController@index');
    // Route::post('/consulta_documento/registrar','ConsultaDocumentoController@store');
    // Route::put('/consulta_documento/actualizar','ConsultaDocumentoController@update');
    // Route::put('/consulta_documento/desactivar','ConsultaDocumentoController@desactivar');
    // Route::put('/consulta_documento/activar','ConsultaDocumentoController@activar');
// });

Route::get('/documento/busqueda','DocumentoController@obtenerDocumento');
Route::get('/matricula/busqueda','MatriculaController@obtenerMatricula');
Route::get('/matricula_estudiante/busqueda/convocatorias','MatriculaController@obtenerConvocatorias');

Route::group(['middleware' => ['permission:super_admin|dashboard_estudiante_listar']], function () {
    Route::get('/matricula_estudiante/busqueda/convocatoria','MatriculaController@obtenerConvocatoria');
    Route::get('/matricula_estudiante/busqueda/matricula','MatriculaController@obtenerMatriculaEstudiante');
    Route::get('/matricula_estudiante/busqueda/inscripcion_estudiante','MatriculaController@obtenerInscripcionEstudiante');
});

Route::get('/conductor/busqueda','DocumentoController@obtenerConductorPorNombre');

Route::post('/matricula','MatriculaController@index');
Route::post('/matricula/importar','MatriculaController@importar');
Route::post('/matricula/reporte/no_inscritos','MatriculaController@descargarMatriculadosNoInscritos');
Route::post('/matricula/plantilla','MatriculaController@descargarPlantilla');

Route::post('/ingresante/importar','IngresanteController@importar');

Route::post('/inscrito','InscritoController@index');
Route::post('/inscrito/historico','InscritoController@indexHistorico');
Route::post('/inscrito/registrar','InscritoController@store');
Route::post('/inscrito/registrar_test','InscritoController@storeTest');
Route::put('/inscrito/actualizar','InscritoController@update');
Route::put('/inscrito/validar_voucher','InscritoController@validarVoucher');
Route::put('/inscrito/actualizar/anulacion','InscritoController@updateAnulacion');
Route::post('/inscrito/validar_credencial','InscritoController@validarCredencial');
Route::post('/inscrito/reporte/inscritos','InscritoController@exportReporteInscrito');
Route::post('/inscrito/reporte/inscritos_oficial','InscritoController@exportReporteInscritoOficial');
Route::post('/inscrito/reporte/inscritos_oficial/historico','InscritoController@exportReporteInscritoOficialHistorico');
Route::post('/inscrito/reporte/inscritos_anulado','InscritoController@exportReporteInscritoAnulado');
Route::post('inscrito/reporte/inscritos_oficial/nuevo_duplicado','InscritoController@exportReporteInscritoOficialNuevoDuplicado');
Route::post('inscrito/reporte/inscritos_oficial/photo/nuevo_duplicado','InscritoController@exportReporteInscritoOficialPhotoNuevoDuplicado');
Route::post('/inscrito/descargar/nuevo','InscritoController@descargarPhotosNuevo');
Route::post('/inscrito/descargar/diversos','InscritoController@descargarPhotosDiversos');
Route::post('/inscrito/invalidar_fotografia','InscritoController@invalidarFotografia');
Route::post('/inscrito/validar_imagen','InscritoController@validarImagen');
Route::post('/inscrito/cambiar_dpi','InscritoController@cambiarDpiImagen');
Route::post('/inscrito/obtener_foto_anterior_estudiante','InscritoController@obtenerFotoAnteriorEstudiante');
Route::post('/inscrito/obtener_foto','InscritoController@obtenerFotoEstudiante');
Route::post('/inscrito/validar_pagos','InscritoController@importarPagos');

Route::group(['middleware' => ['permission:dashboard_estudiante_listar']], function () {
    Route::post('/inscrito_estudiante/registrar','InscritoEstudianteController@store');    
});

Route::get('/convocatoria','ConvocatoriaController@index');
Route::post('/convocatoria','ConvocatoriaController@index');
Route::post('/convocatoria/registrar','ConvocatoriaController@store');
Route::put('/convocatoria/actualizar','ConvocatoriaController@update');
Route::get('/convocatoria/select','ConvocatoriaController@listarConvocatoriasSelect');

Route::get('/estudiante','EstudianteController@index');
Route::post('/estudiante','EstudianteController@index');
Route::post('/estudiante/registrar','EstudianteController@store');
Route::put('/estudiante/actualizar','EstudianteController@update');
Route::get('/estudiante/select','EstudianteController@listarEstudiantesSelect');

Route::get('/periodo_academico','PeriodoAcademicoController@index');
Route::post('/periodo_academico','PeriodoAcademicoController@index');
Route::post('/periodo_academico/registrar','PeriodoAcademicoController@store');
Route::put('/periodo_academico/actualizar','PeriodoAcademicoController@update');
Route::get('/periodo_academico/select','PeriodoAcademicoController@listarPeriodosAcademicosSelect');
Route::get('/periodo_academico/general/select','PeriodoAcademicoController@listarPeriodosAcademicosGeneralSelect');

Route::get('/documento_envio','DocumentoEnvioController@index');
Route::post('/documento_envio','DocumentoEnvioController@index');
Route::post('/documento_envio/registrar','DocumentoEnvioController@store');
Route::put('/documento_envio/actualizar','DocumentoEnvioController@update');
Route::post('/documento_envio/enviar','DocumentoEnvioController@enviar');
Route::post('/documento_envio/recibir','DocumentoEnvioController@recibir');

Route::get('/carga_matricula','CargaMatriculaController@index');
Route::post('/carga_matricula','CargaMatriculaController@index');
Route::post('/carga_matricula/id','CargaMatriculaController@indexById');
Route::post('/carga_matricula/registrar','CargaMatriculaController@store');
Route::put('/carga_matricula/actualizar','CargaMatriculaController@update');

Route::get('/detalle_envio','DocumentoEnvioController@indexDetalle');
Route::post('/detalle_envio','DocumentoEnvioController@indexDetalle');

Route::get('/documento_recibido','DocumentoRecibidoController@index');
Route::post('/documento_recibido','DocumentoRecibidoController@index');

Route::get('/solicitud_documento','SolicitudDocumentoController@index');
Route::post('/solicitud_documento','SolicitudDocumentoController@index');
Route::post('/solicitud_documento/registrar','SolicitudDocumentoController@store');
Route::put('/solicitud_documento/actualizar','SolicitudDocumentoController@update');
Route::post('/solicitud_documento/descargar_constancia','SolicitudDocumentoController@descargarConstancia');

Route::get('/perfil','PerfilController@index');
// Route::post('/perfil/registrar','PerfilController@store');
Route::put('/perfil/actualizar','PerfilController@update');
// Route::put('/perfil/desactivar','PerfilController@desactivar');
// Route::put('/perfil/activar','PerfilController@activar');

Route::group(['middleware' => ['permission:super_admin|dashboard_estudiante_listar']], function () {
    Route::get('/perfil/obtener','PerfilController@obtenerPerfil');
    Route::post('/perfil/actualizar_password','PerfilController@actualizarPassword');    
});