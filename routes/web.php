<?php

use Illuminate\Support\Facades\Route;

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
Route::get('alumno/catalogo',function(){
    return view('alumno.cat_archivos');
});

Route::get('alumno/agregar_archivo',function(){
    return view('alumno.add_archivo');
});
/*----------------------ADMINISTRADOR-------------------------- */
Route::get('administrador/add_admin',function(){
    return view('administrador.add_admin');
});

Route::get('administrador/vista_admin',function(){
    return view('administrador.vista_admin');
});