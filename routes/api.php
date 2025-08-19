<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Encryption keys generated successfully.
// Personal access client created successfully.
// Client ID: 1
// Client secret: gDBLOxnaXdDjPQSgl1Q3gO1D10iQ9lkPNkv3SmvO
// Password grant client created successfully.
// Client ID: 2
// Client secret: NxZIP8T6xEmD8RBp3xPg7uhJr3MtFwZTpn5DgR86

Route::post('login', 'api\AuthController@login');

Route::get('index', 'api\AuthController@index')->middleware('auth:api');

Route::get('user', 'api\AuthController@user')->middleware('auth:api');

Route::post('logout', 'api\AuthController@logout')->middleware('auth:api');

Route::post('document', 'PeruConsultController@index')->middleware('auth:api');

Route::post('document_sunat', 'SunatConsultaController@index')->middleware('auth:api');

Route::get('document_get_sunat', 'SunatConsultaController@indexGet')->middleware('auth:api');