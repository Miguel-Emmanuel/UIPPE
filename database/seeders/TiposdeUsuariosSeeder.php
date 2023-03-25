<?php

namespace Database\Seeders;
use App\Models\Tipos;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposdeUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new Tipos();
        $tipo->clave= 'TIP1';
        $tipo->nombre = 'Administrador';
        $tipo->descripcion = 'Tiene acceso total al sistema';
        $tipo->activo = '1';
        $tipo->id_registro = '1';
        $tipo->save();

        $tipo = new Tipos();
        $tipo->clave= 'TIP2';
        $tipo->nombre = 'Administrador de Plataforma';
        $tipo->descripcion = 'Tiene acceso total al sistema';
        $tipo->activo = '1';
        $tipo->id_registro = '1';
        $tipo->save();

        $tipo = new Tipos();
        $tipo->clave= 'TIP3';
        $tipo->nombre = 'Encargado de Área';
        $tipo->descripcion = 'Tiene acceso total al sistema';
        $tipo->activo = '1';
        $tipo->id_registro = '1';
        $tipo->save();

        $tipo = new Tipos();
        $tipo->clave= 'TIP4';
        $tipo->nombre = 'Secretaria';
        $tipo->descripcion = 'Solo tiene acceso al apartado de Metas y gráficas';
        $tipo->activo = '1';
        $tipo->id_registro = '1';
        $tipo->save();

        $tipo = new Tipos();
        $tipo->clave= 'TIP5';
        $tipo->nombre = 'Invitado';
        $tipo->descripcion = 'Solo puede ver el contenido en gráficas';
        $tipo->activo = '1';
        $tipo->id_registro = '1';
        $tipo->save();
    }
}
