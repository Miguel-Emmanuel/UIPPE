<?php

namespace Database\Seeders;
use App\Models\Programas;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programa = new Programas();
        $programa->abreviatura = 'SIPREP';
        $programa->nombre = 'Sistema de Presentación del Dictamen de estados financieros para efectos fiscales';
        $programa->descripcion = 'Es un programa diseñado por el SAT para apoyar al contribuyente en la presentación de los dictámenes fiscales a través de internet facilitando el cumplimiento oportuno de sus obligaciones fiscales';
        $programa->activo = '1';
        $programa->id_registro = '1';
        $programa->save();

        $programa = new Programas();
        $programa->abreviatura = 'POA Federal';
        $programa->nombre = 'Programa Operativo Anual';
        $programa->descripcion = 'Presupuestar los recursos financieros necesarios para el cumplimiento de las metas del Programa de Trabajo Anual (PTA), mediante acciones programadas, por procesos estratégicos y clave';
        $programa->activo = '1';
        $programa->id_registro = '1';
        $programa->save();

        $programa = new Programas();
        $programa->abreviatura = 'PIDE';
        $programa->nombre = 'Programa Institucional de Desarrollo';
        $programa->descripcion = 'Programa Institucional de Desarrollo';
        $programa->activo = '1';
        $programa->id_registro = '1';
        $programa->save();

        $programa = new Programas();
        $programa->abreviatura = 'PROPIAS';
        $programa->nombre = 'UTVT';
        $programa->descripcion = 'UTVT';
        $programa->activo = '1';
        $programa->id_registro = '1';
        $programa->save();
    }
}
