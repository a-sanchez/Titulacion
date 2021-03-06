<?php

use App\Http\Controllers\AccesoController;
use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\UserController;

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


Route::get('/',[UserController::class,"index"])->name("login");
Route::post('/login',[UserController::class,"inicioSesion"]);
// Route::get('usuarios/create',function(){
//          return view('usuarios.add_usuario');
//      });

 Route::get('administrador/create',function(){
     return view('administrador.add_admin');
 });
 //Route::post('administrador', []);

  Route::resource('usuarios',AccesoController::class);
  Route::resource('administrador',AdministradorController::class);


Route::group(['middleware'=>['auth']],function(){
Route::get('/salir',[UserController::class,"salir"]);
//  Route::resource('usuarios',AccesoController::class);
 Route::resource('alumno',FilesController::class);
//  Route::resource('administrador',AdministradorController::class);
/*-----------------------CREDITOS--------------------------*/
Route::get('creditos/view_creditos',function(){
    return view('creditos.view_creditos');
});
Route::get('creditos/creditos',function(){
    return view('creditos.view_creditos_admin');
});
});
// Route::get('/', function () {
//     return view('welcome');
// });

//usuarios
// Route::get('usuarios/usuario_nuevo',function(){
//     return view('usuarios.add_usuario');
// });




/*------------------------ARCHIVOS-------------------------------*/
// Route::get('alumno/catalogo',function(){
//     return view('alumno.cat_archivos');
// });

// Route::get('alumno/agregar_archivo',function(){
//     return view('alumno.add_archivo');
// });
// Route::resource('usuarios',AccesoController::class);
// Route::resource('alumno',FilesController::class);
/*----------------------ADMINISTRADOR-------------------------- */
// Route::get('administrador/add_admin',function(){
//     return view('administrador.add_admin');
// });

// Route::get('administrador/vista_admin',function(){
//     return view('administrador.vista_admin');
// });

// Route::resource('administrador',AdministradorController::class);
// /*-----------------------CREDITOS--------------------------*/
// Route::get('creditos/view_creditos',function(){
//     return view('creditos.view_creditos');
// });
// Route::get('creditos/creditos',function(){
//     return view('creditos.view_creditos_admin');
// });