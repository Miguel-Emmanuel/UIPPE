<?php

namespace Database\Seeders;
use App\Models\Areas;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $area = new Areas();
        $area->clave= 'ARE1';
        $area->nombre = 'Secretaría de Vinculación';
        $area->descripcion = 'Secretaría de Vinculación';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE2';
        $area->nombre = 'Organo Interno De Control';
        $area->descripcion = 'Organo Interno De Control';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE3';
        $area->nombre = 'Unidad De Información, Planeación, Programación  y Evaluación';
        $area->descripcion = 'UIPPE';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE4';
        $area->nombre = 'Secretaria Académica';
        $area->descripcion = 'Secretaria Académica';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE5';
        $area->nombre = 'Desarrollo y Fortalecimiento Académico';
        $area->descripcion = 'Desarrollo y Fortalecimiento Académico';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE6';
        $area->nombre = 'Secretaría de Vinculación';
        $area->descripcion = 'Secretaría de Vinculación';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE7';
        $area->nombre = 'Subdirección de Proyectos de Vinculación';
        $area->descripcion = 'Subdirección de Proyectos de Vinculación';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE8';
        $area->nombre = 'Departamento de Servicios Tecnológicos';
        $area->descripcion = 'Departamento de Servicios Tecnológicos';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE9';
        $area->nombre = 'Departamento de Desempeño a Egresados';
        $area->descripcion = 'Departamento de Desempeño a Egresados';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE10';
        $area->nombre = 'Centro de Desarrollo de Negocios/Centro de Protección de Invenciones y Marcas';
        $area->descripcion = 'CEPIMUTVTOL';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE11';
        $area->nombre = 'Coordinación de la Entidad de Certificación y Evaluación';
        $area->descripcion = 'CONOCER';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE12';
        $area->nombre = 'Dirección de Difusión y Extensión Universitaria';
        $area->descripcion = 'Dirección de Difusión y Extensión Universitaria';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE13';
        $area->nombre = 'Departamento de Actividades Culturales y Deportivas';
        $area->descripcion = 'Departamento de Actividades Culturales y Deportivas';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE14';
        $area->nombre = 'Departamento de Prensa y Difusión';
        $area->descripcion = 'Departamento de Prensa y Difusión';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE15';
        $area->nombre = 'Departamento de Educación Continua';
        $area->descripcion = 'Departamento de Educación Continua';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE16';
        $area->nombre = 'Departamento de Administración y Finanzas';
        $area->descripcion = 'Departamento de Administración y Finanzas';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();
        
        $area = new Areas();
        $area->clave= 'ARE17';
        $area->nombre = 'Departamento de Recursos Humanos';
        $area->descripcion = 'Departamento de Recursos Humanos';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE18';
        $area->nombre = 'Departamento de Recursos Materiales';
        $area->descripcion = 'Departamento de Recursos Materiales';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE19';
        $area->nombre = 'Departamento de Mantenimiento y Servicios Generales';
        $area->descripcion = 'Departamento de Mantenimiento y Servicios Generales';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE20';
        $area->nombre = 'Departamento de Sistemas';
        $area->descripcion = 'Departamento de Sistemas';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

        $area = new Areas();
        $area->clave= 'ARE21';
        $area->nombre = 'Subdirección de Finanzas';
        $area->descripcion = 'Subdirección de Finanzas';
        $area->foto ='cuervo.png';
        $area->activo = '1';
        $area->id_registro = '1';
        $area->save();

    }
}
