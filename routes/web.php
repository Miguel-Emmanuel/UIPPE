<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
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
Route::get('dashboard', function () {
   return view('dashboard.dashboard');
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
Route::name('registrate')->get('registrate', [Login::class, 'registrate']);
Route::name('register')->post('register', [Login::class, 'store']);
Route::name('recuperacion')->get('recuperacion', [Login::class, 'recuperar']);

Route::name('EnviarCorreo')->get('EnviarCorreo', [Login::class, 'EnviarCorreo']);
Route::name('reset')->get('reset', [Login::class, 'reset']);
Route::name('resetpass')->get('resetpass', [Login::class, 'resetpass']);

