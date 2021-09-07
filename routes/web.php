<?php

use App\Http\Controllers\AccesoController;
use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;

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

Route::get('/', function () {
    return view('welcome');
});

//usuarios
Route::get('usuarios/usuario_nuevo',function(){
    return view('usuarios.add_usuario');
});




/*------------------------ARCHIVOS-------------------------------*/
// Route::get('alumno/catalogo',function(){
//     return view('alumno.cat_archivos');
// });

// Route::get('alumno/agregar_archivo',function(){
//     return view('alumno.add_archivo');
// });
Route::resource('usuarios',AccesoController::class);
Route::resource('alumno',FilesController::class);
/*----------------------ADMINISTRADOR-------------------------- */
// Route::get('administrador/add_admin',function(){
//     return view('administrador.add_admin');
// });

// Route::get('administrador/vista_admin',function(){
//     return view('administrador.vista_admin');
// });

Route::resource('administrador',AdministradorController::class);
/*-----------------------CREDITOS--------------------------*/
Route::get('creditos/view_creditos',function(){
    return view('creditos.view_creditos');
});
Route::get('creditos/creditos',function(){
    return view('creditos.view_creditos_admin');
});