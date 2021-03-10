<?php

use App\Http\Controllers\ArriendosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\VehiculosController;
use App\Models\Arriendo;
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

Route::get('/', [HomeController::class, 'home'])->name('inicio');

Route::get('/login', [HomeController::class, 'login' ])->name('home.login');
Route::get('/cambiar-contraseña', [HomeController::class, 'password' ])->name('home.password');

Route::post('/login', [UsuariosController::class, 'login' ])->name('usuarios.login');
Route::post('/logout', [UsuariosController::class, 'logout' ])->name('usuarios.logout');
Route::post('/cambiar-contrasena', [UsuariosController::class, 'password' ])->name('usuarios.password');

Route::resource('/clientes',ClientesController::class)->parameters(['clientes' => 'cliente']);
Route::get('/clientes/arriendos/{id}', [ClientesController::class, 'arriendos' ])->name('clientes.arriendos');

Route::resource('/arriendos',ArriendosController::class)->parameters(['arriendos' => 'arriendo']);
Route::get('/arriendos/{id}/imagenes', [ArriendosController::class, 'arriendos' ])->name('arriendos.imagenes');

Route::get('/generar-pdf', [ArriendosController::class, 'generarPdf'])->name('generar-pdf');

Route::get('/arriendos/{id}/imagenes', [ArriendosController::class, 'imagenes' ])->name('arriendos.imagenes');

Route::resource('/vehiculos',VehiculosController::class)->parameters(['vehiculos' => 'cliente']);

Route::resource('/usuarios',UsuariosController::class)->parameters(['usuarios' => 'usuario']);

Route::resource('/tipos',TiposController::class)->parameters(['tipos' => 'tipo']);
