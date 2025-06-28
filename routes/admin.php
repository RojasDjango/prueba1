<?php

use App\Http\Controllers\Admin\ActividadsController;
use App\Http\Controllers\Admin\CapacitacionController;
use App\Http\Controllers\Admin\DatospersonalsController;
use App\Http\Controllers\Admin\EjecutorasController;
use App\Http\Controllers\Admin\EstadisticaController;
use App\Http\Controllers\Admin\EventoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProvinciaController;
use App\Http\Controllers\Admin\SocialNetworkController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Datospersonal;
use App\Models\Provincia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index'])->name('admin.home');//cargado 1
//usuario y roles
Route::resource('users', UserController::class)->names('admin.users');//cargado 2
Route::get('users/nacional/index',[UserController::class,'nacional'])->name('admin.users.nacional.index');//cargado 3
Route::get('users/regional/index',[UserController::class,'regional'])->name('admin.users.regional.index');//cargado 4
Route::get('users/provincial/index',[UserController::class,'provincial'])->name('admin.users.provincial.index');//cargado 5
Route::get('users/distrital/index',[UserController::class,'distrital'])->name('admin.users.distrital.index');//cargado 6

Route::resource('datospersonals', DatospersonalsController::class)->names('admin.datospersonals');//cargado 7
//ruta para ver la lista pero solo de su departamento.
Route::get('datospersonals/departamento/index',[DatospersonalsController::class,'departamentoindex'])->name('admin.datospersonals.departamento.index');//cargado 8
//ruta para ver la lista pero solo de provincias del usurio autentificado
Route::get('datospersonals/provincia/index',[DatospersonalsController::class,'provinciaindex'])->name('admin.datospersonals.provincia.index');//cargado 9
//ruta para ver la lista pero solo el distrito del usurio autentificado
Route::get('datospersonals/distrito/index',[DatospersonalsController::class,'distritoindex'])->name('admin.datospersonals.distrito.index');//cargado 10
// esta ruta de dato solo se creo para mostrar los datos del usuario autentificado
Route::get('datos',[DatospersonalsController::class,'dato'])->name('admin.dato');//cargado 11

Route::resource('socialnetworks', SocialNetworkController::class)->names('admin.socialnetworks');//cargado 12


//comandos
Route::resource('ejecutoras', EjecutorasController::class)->names('admin.ejecutoras');//cargado13
//ver la lista de comando pero solo del que cargo
Route::get('ejecutoras/vercomando/index',[EjecutorasController::class,'vercomando'])->name('admin.ejecutoras.vercomando.index');//cargar 14

//capcitaciones
Route::resource('capacitaciones', CapacitacionController::class)->names('admin.capacitaciones');//cargado 15

//eventos
Route::resource('eventos', EventoController::class)->names('admin.eventos');//cargado 16

//actividad
Route::resource('actividads', ActividadsController::class)->names('admin.actividads');//cargar 17
Route::get('actividads/cargar', [ActividadsController::class,'cargarmilitante'])->name('admin.actividads.carga');//cargar 18
Route::get('actividads/evaluacionprogramador/index',[ActividadsController::class,'evaluacionprogramador'])->name('admin.actividads.evaluacionprogramador.index');//cargar 19

//estadistica
Route::resource('estadisticas', EstadisticaController::class)->names('admin.estadisticas');//cargar 20