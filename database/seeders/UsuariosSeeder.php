<?php

namespace Database\Seeders;
use App\Models\Usuarios;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario= new Usuarios();
        $usuario->clave = 'URS1';
        $usuario->nombre = 'Jimena';
        $usuario->app = 'Diaz';
        $usuario->apm = 'De Los Santos';
        $usuario->gen = 'F';
        $usuario->fn = '2003-02-24';
        $usuario->academico = 'TSU Área Dasarrollo de Software Multiplataforma';
        $usuario->foto = 'cuervo.png';
        $usuario->email = 'al222110707@gmail.com';
        $usuario->pass = '123456';
        $usuario->id_tipo = '1';
        $usuario->activo = '1';
        $usuario->id_registro = '1';
        $usuario->save();

        $usuario= new Usuarios();
        $usuario->clave = 'URS2';
        $usuario->nombre = 'Jossue Alejandro';
        $usuario->app = 'Candelas';
        $usuario->apm = 'Hernandez';
        $usuario->gen = 'M';
        $usuario->fn = '2003-06-17';
        $usuario->academico = 'TSU Área Dasarrollo de Software Multiplataforma';
        $usuario->foto = 'cuervo.png';
        $usuario->email = 'al222110811@gmail.com';
        $usuario->pass = '123456';
        $usuario->id_tipo = '1';
        $usuario->activo = '1';
        $usuario->id_registro = '2';
        $usuario->save();

        $usuario= new Usuarios();
        $usuario->clave = 'URS3';
        $usuario->nombre = 'Miguel Emmanuel';
        $usuario->app = 'Arriola';
        $usuario->apm = 'Ortega';
        $usuario->gen = 'M';
        $usuario->fn = '2003-05-01';
        $usuario->academico = 'TSU Área Dasarrollo de Software Multiplataforma';
        $usuario->foto = 'cuervo.png';
        $usuario->email = 'aal222010230@gmail.com';
        $usuario->pass = '123456';
        $usuario->id_tipo = '1';
        $usuario->activo = '1';
        $usuario->id_registro = '2';
        $usuario->save();
    }
}
