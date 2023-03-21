<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\AreasUsuariosController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\AreasMetasController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProgramasController;
use App\Http\Controllers\TiposController;

use Illuminate\Support\Facades\Mail;
use App\Mail\ReestablecerPassword;
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
    return view('sesiones/login');
   // return view('dashboard.dashboard');
});
Route::name('dashboard') -> get('dashboard', [GraficosController::class, 'dashboard']);

 Route::get('multi', function () {
    return view('multi');
 });

 Route::get('graficos', function () {
   return view('graficos.graficos');
});

/*Route::post('crecuperar', function(){
   Mail::to('admiuippe@gmail.com')->send(new ReestablecerPassword);
   return("Revise su Bandeja de Entrada");
})->name('mails.crecuperar');

Route::get('crecuperar', function(){
   Mail::to('admiuippe@gmail.com')->send(new ReestablecerPassword);
   return("Revise su Bandeja de Entrada");
})->name('mails.crecuperar');*/


Route::name('login')->get('login', [Login::class, 'login']);
Route::name('logout')->get('logout', [Login::class, 'logout']);
Route::name('valida')->post('valida', [Login::class, 'valida']);
Route::name('registrate')->get('registrate',  [Login::class, 'registrate']);

Route::name('multi')->get('multi',  [AreasMetasController::class, 'index']);

Route::name('register')->post('register', [Login::class, 'store']);
Route::name('recuperacion')->get('recuperacion', [Login::class, 'recuperar']);

Route::name('EnviarCorreo')->get('EnviarCorreo', [Login::class, 'EnviarCorreo']);
Route::name('reset')->get('reset', [Login::class, 'reset']);
Route::name('resetpass')->get('resetpass', [Login::class, 'resetpass']);

//Resources
Route::resource('areas', AreasController::class);
Route::resource('programas', ProgramasController::class);
Route::resource('usuarios',UsuariosController::class);
Route::resource('metas', MetasController::class);
Route::resource('tipos', TiposController::class);
Route::resource('areasmetas', AreasMetasController::class);
//Route::resource('multi', AreasMetasController::class);
Route::resource('areas-usuarios', AreasUsuariosController::class);

Route::name('deleteMeta')->put('deleteMeta/{id}',[MetasController::class, 'destroy']);
Route::name('editMeta')->put('editMeta/{id}', [MetasController::class, 'edit']);

Route::name('editArea')->put('editArea/{id}', [AreasController::class, 'edit']);
Route::name('deleteArea')->put('deleteArea/{id}',[AreasController::class, 'destroy']);

Route::name('editUsuario')->put('editUsuario/{id}', [UsuariosController::class, 'edit']);
Route::name('deleteUsers')->put('deleteUsers/{id}',[UsuariosController::class, 'destroy']);

Route::name('editProgram')->put('editProgram/{id}', [ProgramasController::class, 'edit']);
Route::name('deleteProgram')->put('deleteProgram/{id}',[ProgramasController::class, 'destroy']);

Route::name('editTip')->put('editTip/{id}', [TiposController::class, 'edit']);
Route::name('deleteTip')->put('deleteTip/{id}',[TiposController::class, 'destroy']);
Route::name('deleteTip')->get('deleteTip/{id}',[TiposController::class, 'destroy']);

Route::name('editAreaUser')->put('editAreaUser/{id}', [AreasUsuariosController::class, 'edit']);
Route::name('deleteAreaUser')->get('deleteAreaUser/{id}',[AreasUsuariosController::class, 'destroy']);
Route::post('areauser/store',[AreasUsuariosController::class, 'store'])->name('areausuario.store');






Route::name('graficos')->get('graficos',[GraficosController::class, 'graficos']);