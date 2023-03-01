<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProgramasController;
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


Route::resource('usuarios',UsuariosController::class);


Route::resource('programas', ProgramasController::class);
