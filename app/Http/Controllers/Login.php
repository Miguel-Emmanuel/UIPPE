<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReestablecerPassword;
use App\Models\AreasUsuarios;
use Illuminate\Support\Facades\DB;

class Login extends Controller
{
    //

    public function login()
    {
        return view('sesiones/login');
    }

    public function registrate(Request $request)
    {
        return view('sesiones.register');
    }

    public function valida(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('pass');

        $consulta = Usuarios::where('email', '=', $email)
            ->where('pass', '=', $pass)
            ->get();

        if (count($consulta) == 0 or $consulta[0]->activo == '0') {
            return redirect('login');
        } else {
                
            $area = AreasUsuarios::where('usuario_id', '=', $consulta[0]->id_usuario)
            ->get();

            if ($consulta[0]->id_tipo == 3 && count($area) == 0) {
                return redirect('login');
            } else {
                $request->session()->put('session_id', $consulta[0]->id_usuario);
                $request->session()->put('session_name', $consulta[0]->nombre . ' ' . $consulta[0]->app . ' ' . $consulta[0]->apm);
                $request->session()->put('session_nombre', $consulta[0]->nombre);
                $request->session()->put('session_app', $consulta[0]->app);
                $request->session()->put('session_apm', $consulta[0]->apm);
                $request->session()->put('genero', $consulta[0]->gen);
                $request->session()->put('email', $consulta[0]->email);
                $request->session()->put('academico', $consulta[0]->academico);
                $request->session()->put('fn', $consulta[0]->fn);
                $request->session()->put('session_tipo', $consulta[0]->id_tipo);

                if ($consulta[0]->id_tipo != 3) {
                    $request->session()->put('session_area', 0);
                } else {
                    $request->session()->put('session_area', $area[0]->area_id);
                }
                $request->session()->put('session_foto', $consulta[0]->foto);

                return redirect('dashboard');
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('login');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        //Queda pendiente la encriptación $input['password']=bcrypt($request->password);
        Usuarios::create($input);

        return redirect('login');
    }

    public function cuser()
    {
        $user = Usuarios::all();
        return $user;
    }

    public function editView(Request $request)
    {
        return view('Usuarios.perfilEdit');
    }

    public function edit(Request $request, Usuarios $id)
    {
        $rules = [
            'email' => 'required',
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'academico' => 'required',
        ];

        $message = [
            'email.required' => 'Es necesario llenar el campo',
            'nombre.required' => 'Es necesario llenar el campo',
            'app.required' => 'Es necesario llenar el campo',
            'apm.required' => 'Es necesario llenar el campo',
            'academico.required' => 'Es necesario llenar el campo',
        ];

        $this->validate($request, $rules, $message);

        $query = Usuarios::find($id->id_usuario);

        if ($request->file('foto')  !=  '') {
            $file = $request->file('foto');
            $foto1 = $file->getClientOriginalName();
            $dates = date('YmdHis');
            $foto2 = $dates . $foto1;
            \Storage::disk('local')->put($foto2, \File::get($file));
        } else {
            $foto2 = $query->foto;
        }

        $query->email = trim($request->email);
        $query->nombre = trim($request->nombre);
        $query->app = trim($request->app);
        $query->apm = trim($request->apm);
        $query->gen = $request->genero;
        $query->fn = $request->fn;
        $query->foto = $foto2;
        $query->academico = trim($request->academico);
        $query->save();

        $request->session()->put('email', trim($request->email));
        $request->session()->put('session_nombre', trim($request->nombre));
        $request->session()->put('session_app', trim($request->app));
        $request->session()->put('session_apm', trim($request->apm));
        $request->session()->put('session_name', trim($request->nombre) . ' ' . trim($request->app) . ' ' . trim($request->apm));
        $request->session()->put('genero', trim($request->genero));
        $request->session()->put('session_foto', $foto2);
        $request->session()->put('fn', trim($request->fn));
        $request->session()->put('academico', trim($request->academico));

        return redirect('perfil');
    }
}
