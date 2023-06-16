 <?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\AreasUsuariosController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\AreasMetasController;
use App\Http\Controllers\CalendarizarsController;
use App\Http\Controllers\CorreosController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProgramasController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use App\Mail\ReestablecerPassword;
use App\Models\Areas;
use App\Models\AreasMetas;
use App\Models\AreasUsuarios;
use App\Models\Calendarizars;
use App\Models\Metas;
use App\Models\Programas;
use App\Models\Usuarios;
use Laravel\SerializableClosure\Serializers\Signed;

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

// Vistas sin controlador START
Route::get('/', function () {
    return view('sesiones/login');
   // return view('dashboard.dashboard');
});

 Route::get('graficos', function () {
   return view('graficos.graficos');
});
// Vistas sin controlador START

//    Login start
Route::name('login')->get('login', [Login::class, 'login']);
Route::name('logout')->get('logout', [Login::class, 'logout']);
Route::name('valida')->post('valida', [Login::class, 'valida']);
Route::name('registrate')->get('registrate',  [Login::class, 'registrate']);
Route::name('EditarPerfil')->get('EditarPerfil',[Login::class, 'editView']);
Route::name('EditPerfil')->put('EditPerfil/{id}', [Login::class, 'edit']);
//    Login end

//    Recuperar contraseña start
Route::name('register')->post('register', [Login::class, 'store']);
Route::name('recuperacion')->get('recuperacion', [Login::class, 'recuperar']);
Route::name('EnviarCorreo')->get('EnviarCorreo', [Login::class, 'EnviarCorreo']);
Route::name('reset')->get('reset', [Login::class, 'reset']);
Route::name('resetpass')->get('resetpass', [Login::class, 'resetpass']);
//    Recuperar contraseña end

//Resources start
Route::resource('areas', AreasController::class);
Route::resource('programas', ProgramasController::class);
Route::resource('usuarios',UsuariosController::class);
Route::resource('metas', MetasController::class);
Route::resource('tipos', TiposController::class);
Route::resource('areasmetas', AreasMetasController::class);
Route::resource('areas-usuarios', AreasUsuariosController::class);
Route::resource('calendarizars', CalendarizarsController::class);
//Resources end

Route::name('multi')->get('multi',  [AreasMetasController::class, 'index']);
Route::name('calendario')->get('calendario', [CalendarizarsController::class, 'index']);
Route::name('entregaMetas')->get('entregaMetas', [CalendarizarsController::class, 'entregasView']);
Route::name('entregasNew')->post('entregasNew', [CalendarizarsController::class, 'entregaN']);
Route::name('entregasUp')->put('entregasUp/{id}', [CalendarizarsController::class, 'updateEntrega']);
// Metodos Edit y Delete start
Route::name('deleteMeta')->put('deleteMeta/{id}',[MetasController::class, 'destroy']);
Route::name('editMeta')->put('editMeta/{id}', [MetasController::class, 'edit']);

Route::name('editArea')->put('editArea/{id}', [AreasController::class, 'edit']);
Route::name('deleteArea')->put('deleteArea/{id}',[AreasController::class, 'destroy']);

Route::name('editUsuario')->put('editUsuario/{id}', [UsuariosController::class, 'edit']);
Route::name('deleteUsers')->put('deleteUsers/{id}',[UsuariosController::class, 'destroy']);
Route::name('perfil')->get('perfil',[UsuariosController::class, 'perfil']);

Route::name('editProgram')->put('editProgram/{id}', [ProgramasController::class, 'edit']);
Route::name('deleteProgram')->put('deleteProgram/{id}',[ProgramasController::class, 'destroy']);

Route::name('editTip')->put('editTip/{id}', [TiposController::class, 'edit']);
Route::name('deleteTip')->put('deleteTip/{id}',[TiposController::class, 'destroy']);
Route::name('deleteTip')->get('deleteTip/{id}',[TiposController::class, 'destroy']);

Route::name('editAreaUser')->put('editAreaUser/{id}', [AreasUsuariosController::class, 'edit']);
Route::name('deleteAreaUser')->get('deleteAreaUser/{id}',[AreasUsuariosController::class, 'destroy']);
Route::post('areauser/store',[AreasUsuariosController::class, 'store'])->name('areausuario.store');

Route::name('calendUpdate') -> put('calendUpdate/{id}', [CalendarizarsController::class, 'update']);
// Metodos Edit y Delete end

//Graficos controller start
Route::name('registrosA') -> get('registrosA/{id}', [GraficosController::class, 'registrosArea']);
Route::name('registros') -> get('registros', [GraficosController::class, 'registros']);
Route::name('dashboard') -> get('dashboard', [GraficosController::class, 'dashboard']);
Route::name('graficos')->get('graficos',[GraficosController::class, 'graficos']);

Route::name('editregistrosA')->put('editregistrosA/{id}', [GraficosController::class, 'editArea']);
Route::name('rpdf')->get('rpdf',[GraficosController::class, 'rpdf']);


//Graficos controller end

//////////////////////////////////////////CORREOS///////////////////////////////////////////////////////////////////////////
Route::name('recuperacion')->get('recuperacion', [CorreosController::class, 'recuperar']);
Route::name('EnviarCorreo')->get('EnviarCorreo', [CorreosController::class, 'EnviarCorreo2']);

Route::name('reset')->get('reset', [CorreosController::class, 'reset'])->middleware('signed');
Route::name('passwordc')->get('passwordc', [CorreosController::class, 'passwordc']);

Route::name('correo')->get('enviados', [CorreosController::class, 'enviados']);
Route::name('pcorreo')->get('pcorreo', [CorreosController::class, 'pcorreo']);

Route::name('prueba')->get('prueba', [CorreosController::class, 'prueba']);

/*Route::name('pcorreo')->get('pcorreo', [Login::class, 'pcorreo']);
Route::name('correo')->get('correo', function(){
   return view('mails.correos');
});*/
///////////////////////////////////////////SELECTS////////////////////////////////////////////////////////////////////////
Route::name('js_metas')->get('js_metas', [AreasMetasController::class, 'js_metas']);
Route::name('js_areas')->get('js_areas', [AreasMetasController::class, 'js_areas']);



//----------------------------Documentos Excel-----------------
Route::controller(UserController::class)->group(function(){
   Route::get('users', 'index');
   Route::get('users-export', 'export')->name('users.export');
   Route::post('users-import', 'import')->name('users.import');
});


Route::controller(AreasController::class)->group(function(){
Route::name('areas.export')->get('areas-export','export');
});

Route::controller(AreasMetasController::class)->group(function(){
   Route::name('areasmetas.export')->get('areasmetas-export','export');
   });

   Route::controller(TiposController::class)->group(function(){
      Route::name('tipos.export')->get('tipos-export','export');
      });
      Route::controller(UsuariosController::class)->group(function(){
         Route::name('usuarios.export')->get('usuarios-export','export');
         });

         Route::controller(AreasUsuariosController::class)->group(function(){
            Route::name('areasusuarios.export')->get('areasusuarios-export','export');
            });

            Route::controller(ProgramasController::class)->group(function(){
               Route::name('programas.export')->get('programas-export','export');
               });

               Route::controller(MetasController::class)->group(function(){
                  Route::name('metas.export')->get('metas-export','export');
                  });





//----------------------------Documentos PDF-----------------------------------
Route::name('pdf')->get('pdf',[AreasController::class, 'pdf']);
Route::name('pdfam')->get('pdfam',[AreasMetasController::class, 'pdfam']);
Route::name('pdft')->get('pdft',[TiposController::class, 'pdft']);
Route::name('pdfu')->get('pdfu',[UsuariosController::class, 'pdfu']);
Route::name('pdfau')->get('pdfau',[AreasUsuariosController::class, 'pdfau']);
Route::name('pdfp')->get('pdfp',[ProgramasController::class, 'pdfp']);
Route::name('pdfmetas')->get('pdfmetas',[MetasController::class, 'pdfm']);
