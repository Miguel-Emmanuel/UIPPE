<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProgramasController;
use App\Http\Controllers\TiposController;

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
    return view('login');
   // return view('dashboard.dashboard');
});
Route::get('dashboard', function () {
   return view('dashboard.dashboard');
});

Route::name('login')->get('login', [Login::class, 'login']);
Route::name('logout')->get('logout', [Login::class, 'logout']);
Route::name('valida')->post('valida', [Login::class, 'valida']);
Route::name('registrate')->get('registrate', [Login::class, 'registrate']);
Route::name('register')->post('register', [Login::class, 'store']);

//Resources 
Route::resource('areas', AreasController::class);
Route::resource('programas', ProgramasController::class);
Route::resource('usuarios',UsuariosController::class);
Route::resource('metas', MetasController::class);
Route::resource('tipos', TiposController::class);

Route::name('deleteMeta')->get('deleteMeta/{id}',[MetasController::class, 'destroy']);
Route::name('editMeta')->put('editMeta/{id}', [MetasController::class, 'edit']);

Route::name('editArea')->put('editArea/{id}', [AreasController::class, 'edit']);
Route::name('deleteArea')->get('deleteArea/{id}',[AreasController::class, 'destroy']);

Route::name('editUsuario')->put('editUsuario/{id}', [UsuariosController::class, 'edit']);
Route::name('deleteUsuario')->get('deleteUsuario/{id}',[UsuariosController::class, 'destroy']);

Route::name('editProgram')->put('editProgram/{id}', [ProgramasController::class, 'edit']);
Route::name('deleteProgram')->get('deleteUsuario/{id}',[ProgramasController::class, 'destroy']);

Route::name('editTip')->put('editTip/{id}', [TiposController::class, 'edit']);
Route::name('deleteTip')->get('deleteTip/{id}',[TiposController::class, 'destroy']);