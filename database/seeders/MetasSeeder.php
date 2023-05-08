<?php

namespace Database\Seeders;

use App\Models\Metas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //METAS SIPREP
        $meta = new Metas();
        $meta->clave= 'MET1';
        $meta->nombre = 'Fomentar que los estudiantes egresen de sus estudios de tipo superior en el ciclo escolar';
        $meta->descripcion = '';
        $meta->unidadmedida ='Egresados';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET2';
        $meta->nombre = 'Atender a la matrícula de educación superior para contribuir en la disminución de las divergencias entre la oferta y la demanda educativa';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET3';
        $meta->nombre = 'Atender a los estudiantes de nuevo ingreso de educación superior para contribuir en la disminución de las divergencias entre la oferta y la demanda educativa';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET4';
        $meta->nombre = 'Realizar acciones de formación integral, para desarrollar capacidades, valores y habilidades profesionales';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acción';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET5';
        $meta->nombre = 'Realizar acciones para fomentar una cultura emprendedora';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acción';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET6';
        $meta->nombre = 'Acreditar programas educativos en educación superior para mejorar la calidad';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET7';
        $meta->nombre = 'Fomentar que los egresados se titulen';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET8';
        $meta->nombre = 'Lograr certificaciones en Educación Superior para mejorar la calidad';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET9';
        $meta->nombre = 'Impulsar la capacitación o actualización del personal docente para mejorar la formación académica';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET10';
        $meta->nombre = 'Evaluar al personal docente con la finalidad de encontrar áreas de oportunidad para mejorar su desempeño';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET11';
        $meta->nombre = 'Impulsar la capacitación del personal directivo y administrativo para el fortalecimiento institucional';
        $meta->descripcion = '';
        $meta->unidadmedida ='Persona';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET12';
        $meta->nombre = 'Desarrollar proyectos de investigación para atender las necesidades de desarrollo tecnológico, económico y social';
        $meta->descripcion = '';
        $meta->unidadmedida ='Proyecto';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET13';
        $meta->nombre = 'Realizar la publicación de documentos derivados de la investigación para su divulgación';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET14';
        $meta->nombre = 'Realizar acciones de vinculación y extensión que permitan establecer lazos de colaboración con los sectores público, privado y social';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acción';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET15';
        $meta->nombre = 'Operar convenios con los sectores público, privado y social, para formalizar los lazos de colaboración institucional';
        $meta->descripcion = '';
        $meta->unidadmedida ='Convenio';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET16';
        $meta->nombre = 'Atender estudiantes en educación Dual para desarrollar aptitudes y habilidades en unidades económicas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET17';
        $meta->nombre = 'Impulsar la internacionalización entre la comunidad de la institución para fortalecer la calidad educativa';
        $meta->descripcion = '';
        $meta->unidadmedida ='Persona';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET18';
        $meta->nombre = 'Contactar egresados en educación superior para identificar su situación profesional';
        $meta->descripcion = '';
        $meta->unidadmedida ='Egresado';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET19';
        $meta->nombre = 'Impartir el idioma Inglés a los estudiantes en educación superior para el desarrollo de competencias';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET20';
        $meta->nombre = 'Impulsar la participación de estudiantes de educación superior en procesos de certificación en el idioma Inglés para el desarrollo de competencias';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET21';
        $meta->nombre = 'Destinar equipo de cómputo el proceso de enseñanza-aprendizaje en educación superior para el desarrollo de las habilidades digitales';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de computo';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET22';
        $meta->nombre = 'Impulsar la participación  de estudiantes en procesos de certificación en el uso de tecnologías del aprendizaje, conocimiento, información y comunicación  para el desarrollo de competencias y habilidades';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET23';
        $meta->nombre = 'Realizar acciones para la prevención de la violencia escolar de educación superior';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acción';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET24';
        $meta->nombre = 'Realizar acciones para igualdad de trato y oportunidades';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acción';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET25';
        $meta->nombre = 'Realizar auditorías, con el propósito de verificar el cumplimiento del marco normativo que regula el funcionamiento de las dependencias y organismos auxiliares del Ejecutivo Estatal y los Ayuntamientos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Auditoria';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET26';
        $meta->nombre = 'Realizar auditorías para determinar el grado de eficacia y eficiencia en los procesos, así como el desempeño Institucional de las dependencias y organismos auxiliares del Ejecutivo Estatal';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET27';
        $meta->nombre = 'Realizar inspecciones a rubros específicos en las dependencias, organismos auxiliares del Ejecutivo Estatal y en su caso Ayuntamientos, con el propósito de constatar el cumplimiento del marco normativo que lo regula';
        $meta->descripcion = '';
        $meta->unidadmedida ='Inspección';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET28';
        $meta->nombre = 'Participar en testificaciones, con el propósito de asegurarse que los actos administrativos se realicen con forme a la normatividad vigente';
        $meta->descripcion = '';
        $meta->unidadmedida ='Testificación';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET29';
        $meta->nombre = 'Participación del órgano de control interno en reuniones que por mandato legal o disposición administrativa así lo requiera';
        $meta->descripcion = '';
        $meta->unidadmedida ='Sesión';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET30';
        $meta->nombre = 'Acompañamiento en la atención de auditorias practicadas por los entes fiscalizadores externos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acción';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET31';
        $meta->nombre = 'Atender acciones derivadas de la Fiscalización realizada por entes fiscalizadores externos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acción';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET32';
        $meta->nombre = 'Atención a observaciones y acciones de mejora determinadas con motivo de los actos de fiscalización realizados por la Dirección General u Órgano Interno de Control';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acción';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET33';
        $meta->nombre = 'Elaborar el informe de presunta responsabilidad administrativa';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET34';
        $meta->nombre = 'Substanciar investigaciones derivadas de denuncias ciudadanas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Expediente';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET35';
        $meta->nombre = 'Substanciar investigaciones derivadas de auditoria';
        $meta->descripcion = '';
        $meta->unidadmedida ='Expediente';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET36';
        $meta->nombre = 'Substanciar investigaciones derivadas de actuación de oficio';
        $meta->descripcion = '';
        $meta->unidadmedida ='Expediente';
        $meta->programa_id = '1';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS POA

        $meta = new Metas();
        $meta->clave= 'MET37';
        $meta->nombre = 'Opinión de Empleadores';
        $meta->descripcion = '';
        $meta->unidadmedida ='Encuesta Realizada';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET38';
        $meta->nombre = 'Promoción de Egresados en el Mercado Laboral Post Estadía';
        $meta->descripcion = '';
        $meta->unidadmedida ='Egresado';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET39';
        $meta->nombre = 'Sesiones de Vinculación y Pertinencia';
        $meta->descripcion = '';
        $meta->unidadmedida ='Reunión Celebrada';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET40';
        $meta->nombre = 'Movilidad Estudiantil Nacional e Internacional';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET41';
        $meta->nombre = 'Difusión de la Oferta Educativa en Instituciones de Educación Media Superior';
        $meta->descripcion = '';
        $meta->unidadmedida ='IEMS Visitadas';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET42';
        $meta->nombre = 'Promoción de Planes de Estudio en Eventos de Orientación Vocacional';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evento o Expo';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET43';
        $meta->nombre = 'Cursos de Educación Continua';
        $meta->descripcion = '';
        $meta->unidadmedida ='Curso';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET44';
        $meta->nombre = 'Campañas de Prevención de Embarazo, Vacunación y Asistencia Médica';
        $meta->descripcion = '';
        $meta->unidadmedida ='Campaña';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET45';
        $meta->nombre = 'Seguimiento y Evaluación de los Programas Operativos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Reporte de Seguimento';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET46';
        $meta->nombre = 'Elaborar Reporte de Indicadores del Modelo de Evaluación de la Calidad (MECASUT) y Evaluación Institucional (EVIN)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe Elaborado';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET47';
        $meta->nombre = 'Informe Anual de Actividades';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento Elaborado';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET48';
        $meta->nombre = 'Sesiones de Comités Institucionales';
        $meta->descripcion = '';
        $meta->unidadmedida ='Sesión';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET49';
        $meta->nombre = 'Encuesta de Satisfacción de Servicios Bibliotecarios';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe de la Encuesta';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET50';
        $meta->nombre = 'Alumnos Inscritos a la Biblioteca Digital';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET51';
        $meta->nombre = 'Legislación Universitaria Publicado';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET52';
        $meta->nombre = 'Otorgamiento de Becas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante Becado';
        $meta->programa_id = '2';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS UIPPE PIDE

        $meta = new Metas();
        $meta->clave= 'MET53';
        $meta->nombre = 'Elaborar informe anual de desempeño';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET54';
        $meta->nombre = 'Instrumentos de Autoevaluación generados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET55';
        $meta->nombre = 'Instrumentos de Autoevaluación aplicados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET56';
        $meta->nombre = 'Tasa de variación del desempeño institucional para el año t.';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET57';
        $meta->nombre = 'Tasa de variación del desempeño institucional para el año t.';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET58';
        $meta->nombre = 'Programa Operativo Anual Federal y Estatal elaborado en congruencia con el PIDE';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET59';
        $meta->nombre = 'Seguimiento mensual a programas y proyectos institucionales realizados. (PAT)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET60';
        $meta->nombre = 'Informe bimenstral elaborado y presentado al Consejo Directivo.';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET61';
        $meta->nombre = 'Informe anual elaborado y presentado al Consejo Directivo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET62';
        $meta->nombre = 'Estadística cuatrimestral elaborada';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET63';
        $meta->nombre = 'Estadística anual elaborada';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS UIPPE PROPIAS

        $meta = new Metas();
        $meta->clave= 'MET64';
        $meta->nombre = 'Celebrar sesiones del Comité Interno de Mejora Regulatoria';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET65';
        $meta->nombre = 'Integración de estadística 911';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET66';
        $meta->nombre = 'Integración de Ficha Técnica Institucional';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET67';
        $meta->nombre = 'Integración de informe de Gobierno';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET68';
        $meta->nombre = 'Integración del Censo Nacional de Gobierno';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET69';
        $meta->nombre = 'Integrar reporte de avance del Programa Anual de Mejora Regulatoria';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET70';
        $meta->nombre = 'Elaboración del Programa Anual de Mejora Regulatoria';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET71';
        $meta->nombre = 'Actualización de trámites y servicios en el RETyS';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET72';
        $meta->nombre = 'Celebrar sesiones del Comité Interno de Ética';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET73';
        $meta->nombre = 'Elaboración del Programa Anual de Ética';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET74';
        $meta->nombre = 'Campaña de difusión del código de conducta y reglas de integridad';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET75';
        $meta->nombre = 'Evaluación anual del código de ética, código de conducta y reglas de integridad';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET76';
        $meta->nombre = 'Capacitación de Servidores públicos en materia de ética y cultura de la denuncia';
        $meta->descripcion = '';
        $meta->unidadmedida ='Capacitación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET77';
        $meta->nombre = 'Capacitación de Servidores públicos en la implementación de la política estatal anticorrupción';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET78';
        $meta->nombre = 'Entrega de reconocimientos a servidores públicos que fomentan una cultura de ética';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET79';
        $meta->nombre = 'Evaluación al Comité de Ética';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET80';
        $meta->nombre = 'Elaboración del Informe Anual de Ética';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET81';
        $meta->nombre = 'Celebrar sesiones del Comité de Transparencia';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET82';
        $meta->nombre = 'Integración de los Proyectos de Sistematización y actualización de la información';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET83';
        $meta->nombre = 'Seguimiento al cumplimiento de los Proyectos de Sistematización y actualización de la información';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET84';
        $meta->nombre = 'Validación de actualización trimestral del IPOMEX';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET85';
        $meta->nombre = 'Atención a solicitudes de información a través de: SAIMEX y SARCOEM';
        $meta->descripcion = '';
        $meta->unidadmedida ='Solicutud';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET86';
        $meta->nombre = 'Celebrar sesiones del Comité Interno de COCODI';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET87';
        $meta->nombre = 'Reporte trimestral de Programa de Trabajo de Control Interno y de Administración de Riesgos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET88';
        $meta->nombre = 'Elaboración del Reporte Anual del Programa de Trabajo de Control Interno y de Administración de Riesgos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET89';
        $meta->nombre = 'Elaboración del anteproyecto de presupuesto';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

       //METAS ABOGACIA PIDE

        $meta = new Metas();
        $meta->clave= 'MET90';
        $meta->nombre = 'Variación de convenios operante';
        $meta->descripcion = '';
        $meta->unidadmedida ='Convenio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET91';
        $meta->nombre = 'Análisis de ordenamientos elaborados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET92';
        $meta->nombre = 'Actualización de ordenamientos jurídicos realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET93';
        $meta->nombre = 'Nuevos ordenamientos elaborados y difundidos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Protocolo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS PROPIAS ABOGACIA

        $meta = new Metas();
        $meta->clave= 'MET94';
        $meta->nombre = 'Auditoría de vigilancia de la NMX-R-025-2015 en Igualdad Laboral y no Discriminación';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET95';
        $meta->nombre = 'Comité de Igualdad Laboral y no Discriminación';
        $meta->descripcion = '';
        $meta->unidadmedida ='Sesión';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS PIDE SECRETARIA ACADEMICA

        $meta = new Metas();
        $meta->clave= 'MET96';
        $meta->nombre = 'Tasa bruta de matriculación en la UTVT';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET97';
        $meta->nombre = 'Tasa de participación en programas de educación profesionales y tecnológicos en la UTVT en personas de 18-24 años en los últimos 12 meses, por sexo en la Zona de Influencia';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET98';
        $meta->nombre = 'Porcentaje de jóvenes y adultos inscritos en la UTVT que han alcanzado al menos un nivel mínimo de competencia digital de B1';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET99';
        $meta->nombre = 'Tasa de logros educativos de jóvenes y adultos por grupo de edad, actividad económica, nivel educativo y orientación del programa (eficiencia terminal)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET100';
        $meta->nombre = 'Tasa de egresados competentes por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET101';
        $meta->nombre = 'Instrumentos para el ingreso por competencias diseñados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET102';
        $meta->nombre = 'Instrumentos para el ingreso por competencias implementados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET103';
        $meta->nombre = 'Instrumentos para el ingreso por competencias actualizados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET104';
        $meta->nombre = 'Valoración cuantitativa y cualitativa de perfiles vocacionales de candidatos a ingreso';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET105';
        $meta->nombre = 'Tasa de cursos por competencias diseñado por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Curso';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET106';
        $meta->nombre = 'Tasa de cursos por competencias impartido por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Curso';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET107';
        $meta->nombre = 'Tasa de cursos por competencias actualizado por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Curso';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET108';
        $meta->nombre = 'Tasa de programas educativos con examen de egreso basado en competencias';
        $meta->descripcion = '';
        $meta->unidadmedida ='Curso';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET109';
        $meta->nombre = 'Porcentaje de egresados con examen de egreso por competencias aprobado por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET110';
        $meta->nombre = 'Grado de coincidencia entre necesidades de las organizaciones y perfiles de alumnos en estadía';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET111';
        $meta->nombre = 'Investigaciones desarrolladas por docentes y alumnos de la UTVT';
        $meta->descripcion = '';
        $meta->unidadmedida ='Investigación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET112';
        $meta->nombre = 'Artículos e investigaciones en revistas científicas indizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Investigación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET113';
        $meta->nombre = 'Artículos e investigaciones en revistas arbitraria';
        $meta->descripcion = '';
        $meta->unidadmedida ='Investigación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET114';
        $meta->nombre = 'Proporción de grupos entre 25 y 35 alumnos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET115';
        $meta->nombre = 'Capacidad instalada por turno';
        $meta->descripcion = '';
        $meta->unidadmedida ='Inmueble';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET116';
        $meta->nombre = 'Vacantes ofertadas por programa educativo en el ciclo escolar n cuatrimestre septiembre-diciembre';
        $meta->descripcion = '';
        $meta->unidadmedida ='Inmueble';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET117';
        $meta->nombre = 'Alumnos que egresan por programa educativo en el ciclo escolar n-1 cuatrimestre enero-abril (ING)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET118';
        $meta->nombre = 'Alumnos que egresan por programa educativo en el ciclo escolar n-1 cuatrimestre mayo-agosto (TSU)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET119';
        $meta->nombre = 'Alumnos de TSU por programa educativo en el ciclo escolar n-1 cuatrimestre enero-abril dados de baja o no reinscritos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET120';
        $meta->nombre = 'Alumnos de Ingeniería por programa educativo en el ciclo escolar n-1 cuatrimestre enero-abril dados de baja o no reinscritos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET121';
        $meta->nombre = 'Alumnos de TSU por programa educativo en el ciclo escolar n-1 cuatrimestre mayo-agosto dados de baja o no reinscritos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET122';
        $meta->nombre = 'Alumnos de Ingeniería por programa educativo en el ciclo escolar n-1 cuatrimestre mayo-agosto dados de baja o no inscritos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET123';
        $meta->nombre = 'Número de grupos aperturados por cuatrimestre por programa educativo para TSU e Ingeniería por cuatrimestre';
        $meta->descripcion = '';
        $meta->unidadmedida ='Aula';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET124';
        $meta->nombre = 'Tasa de crecimiento de matrícula ciclo n.';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET125';
        $meta->nombre = 'Diferencial entre la tasa de crecimiento alcanzada contra el pronóstico de 3.75% anual';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET126';
        $meta->nombre = 'Porcentaje de actualización de acervo bibliográfico';
        $meta->descripcion = '';
        $meta->unidadmedida ='Artículo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET127';
        $meta->nombre = 'Eventos académicos realizados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET128';
        $meta->nombre = 'Juntas de academia realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Reunión';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET129';
        $meta->nombre = 'Reuniones colegiadas realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Reunión';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET130';
        $meta->nombre = 'Variación en el tipo de becas ofertadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Beca';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET131';
        $meta->nombre = 'Evaluaciones externas del PAE para la UTVT realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Evaluación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET132';
        $meta->nombre = 'Indicadores socioeconómicos de la región actualizados anualmente';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET133';
        $meta->nombre = 'Estudios de factibilidad y de mercado para carreras de la Universidad realizados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET134';
        $meta->nombre = 'Tasa de coincidencia del perfil de egreso con las competencias del egresado';
        $meta->descripcion = '';
        $meta->unidadmedida ='Egresado';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET135';
        $meta->nombre = 'Tasa de egresados competentes por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET136';
        $meta->nombre = 'Índice de factibilidad y calidad laboral del programa educativo x';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET137';
        $meta->nombre = 'Tasa de planeaciones didácticas adecuadas a necesidades regionales';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET138';
        $meta->nombre = 'Tasa de actualización de programas educativos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET139';
        $meta->nombre = 'Tasa de actualización de planes educativos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET140';
        $meta->nombre = 'Tasa de programas educativos con contenidos validados por el sector público, privado y social';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET141';
        $meta->nombre = 'Tasa de programas educativos con contenidos validados por el sector público, privado y social';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET142';
        $meta->nombre = 'Promedio de satisfacción de la capacidad del egresado para desempeñar su trabajo adecuadamente por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET143';
        $meta->nombre = 'Proporción de Profesores de tiempo completo (PTC)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET144';
        $meta->nombre = 'Proporción de Profesores con estudios de posgrado: maestría y doctorado a fin al programa educativo x';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET145';
        $meta->nombre = 'Proporción de Profesores capacitados por la UTVT en temas afines a su docencia';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET146';
        $meta->nombre = 'Proporción de PTC´s con Licenciatura becados para estudiar Maestría';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET147';
        $meta->nombre = 'Proporción de PTC´s con Maestría becados para estudiar Doctorado';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET148';
        $meta->nombre = 'Proporción de PTC´s con posgrado par programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET149';
        $meta->nombre = 'Cantidad de alumnos por PTC con posgrado por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET150';
        $meta->nombre = 'Proporción de Docentes (PTC y PA) capacitados en habilidades y técnicas didácticas por cuatrimestre';
        $meta->descripcion = '';
        $meta->unidadmedida ='Docente';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET151';
        $meta->nombre = 'Total de alumnos en educación dual por año y programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET152';
        $meta->nombre = 'Variación de alumnos en educación dual por año';
        $meta->descripcion = '';
        $meta->unidadmedida ='Estudiante';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS FORTALECIMIENTO ACADEMICO PIDE
        $meta = new Metas();
        $meta->clave= 'MET153';
        $meta->nombre = 'Tasa de logros educativos de jóvenes y adultos por grupo de edad, actividad económica, nivel educativo y orientación del programa (eficiencia terminal)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Egresado';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET154';
        $meta->nombre = 'Porcentaje de estudiantes con algún tipo de beca';
        $meta->descripcion = '';
        $meta->unidadmedida ='Beneficiario';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET155';
        $meta->nombre = 'Cobertura de la bibliografía básica y complementaria mencionada en los programas de asignatura de los planes de estudio';
        $meta->descripcion = '';
        $meta->unidadmedida ='Biblioteca';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS FORTALECIMIENTO ACADEMICO PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET156';
        $meta->nombre = 'Porcentaje de estudiantes con algún tipo de beca';
        $meta->descripcion = '';
        $meta->unidadmedida ='Beneficiario';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET157';
        $meta->nombre = 'Cobertura de la bibliografía básica y complementaria mencionada en los programas de asignatura de los planes de estudio';
        $meta->descripcion = '';
        $meta->unidadmedida ='Biblioteca';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET158';
        $meta->nombre = 'Promedio de satisfacción de los estudiantes con los servicios de apoyo psicológico de la UTVT';
        $meta->descripcion = '';
        $meta->unidadmedida ='Biblioteca';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET159';
        $meta->nombre = 'Firma de Convenios con el Sector Productivo y de Servicios';
        $meta->descripcion = '';
        $meta->unidadmedida ='Convenio';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET160';
        $meta->nombre = 'Empleabilidad de Egresados del Modelo de Educación Dual';
        $meta->descripcion = '';
        $meta->unidadmedida ='Egresado empleado';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS DIRECCION DE DIFUSION PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET161';
        $meta->nombre = 'Reuniones con representantes estudiantiles “Charla entre cuervos"';
        $meta->descripcion = '';
        $meta->unidadmedida ='Reunión';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS PRENSA Y DIFUSION PIDE
        $meta = new Metas();
        $meta->clave= 'MET162';
        $meta->nombre = 'Número de actividades de difusión realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET163';
        $meta->nombre = 'Número de actualizaciones a la página web de la universidad y redes sociales realizada';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET164';
        $meta->nombre = 'Actividades de identidad universitaria realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS PRENSA Y DIFUSION PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET165';
        $meta->nombre = 'Publicación y actualización de información general en la página web de la Universidad';
        $meta->descripcion = '';
        $meta->unidadmedida ='Beneficiario';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET166';
        $meta->nombre = 'Publicación de información en la página de Facebook y Twitter (Notas informativas)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Biblioteca';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET167';
        $meta->nombre = 'Diseño de Campaña Publicitaria de la Convocatoria de Ingreso 2021 (Evidencia Digital del Diseño)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Beneficiario';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET168';
        $meta->nombre = 'Difusión a las IEMS de manera virtual sobre el modelo educativo de la universidad (Plática Virtual y/o presencial)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET169';
        $meta->nombre = 'Asistencia de manera virtual a exposiciones organizadas por IEMS para dar a conocer la convocatoria (Expo virtual y/o presencial)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET170';
        $meta->nombre = 'Publicación y actualización de información general en la página web de la Universidad (comprobaciones fiscales)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET171';
        $meta->nombre = 'Orientación informativa a través de la página oficial de Facebook, Twitter e Instagram (Captura de pantalla)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET172';
        $meta->nombre = 'Diseño de diversos materiales (credenciales de estudiantes y personal, corbatines, carteles, folletos, volantes, efemérides, lonas, vinilonas, pendones y banners) (Evidencia digital del diseño)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET173';
        $meta->nombre = 'Diseño de convocatorias culturales y deportivas y Educación Continua. (Evidencia digital del diseño)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET174';
        $meta->nombre = 'Difusión de Educación Dual';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET175';
        $meta->nombre = 'Actualización en la plataforma IPOMEX cada trimestre. (Evidencia digital de la actualización)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET176';
        $meta->nombre = 'Realización de videos institucionales (Evidencia digital)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET177';
        $meta->nombre = 'Realización del informe anual de Rectoría 2021 (Evidencia digital del diseño y/o video)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET178';
        $meta->nombre = 'Solicitud de dictamen técnico de la Convocatoria de Ingreso 2021 (Evidencia digital del oficio)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET179';
        $meta->nombre = 'Campaña "Promocional de los Programas Educativos"';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET180';
        $meta->nombre = 'Publicación de convocatorias internas y externas en la página web de la Universidad';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET181';
        $meta->nombre = 'Realización de "Podcast Universitarios"';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET182';
        $meta->nombre = 'Campaña "Aniversario XXI UTVT"';
        $meta->descripcion = '';
        $meta->unidadmedida ='Publicación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS EDUCACION CONTINUA PIDE
        $meta = new Metas();
        $meta->clave= 'MET183';
        $meta->nombre = 'Actividades de identidad universitaria realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Curso';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET184';
        $meta->nombre = 'Actividades de identidad universitaria realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Convocatoria';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS SUB PROYECTOS DE VINCULACION PIDE
        $meta = new Metas();
        $meta->clave= 'MET185';
        $meta->nombre = 'Beneficios obtenidos para la UTVT a partir de convenio';
        $meta->descripcion = '';
        $meta->unidadmedida ='Convenio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET186';
        $meta->nombre = 'Monto económico generado por convenios';
        $meta->descripcion = '';
        $meta->unidadmedida ='Convenio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET187';
        $meta->nombre = 'Alumnos en movilidad universitaria por tipo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Alumno';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET188';
        $meta->nombre = 'Vacantes ofertadas en la Bolsa de Trabajo de la UTVT por semestre';
        $meta->descripcion = '';
        $meta->unidadmedida ='Empleo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET189';
        $meta->nombre = 'Variación de convenios operantes';
        $meta->descripcion = '';
        $meta->unidadmedida ='Convenio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS SERVICIOS TECNOLOGICOS PIDE
        $meta = new Metas();
        $meta->clave= 'MET190';
        $meta->nombre = 'Servicios tecnológicos prestados a externos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET191';
        $meta->nombre = 'Ingresos generados por servicios tecnológicos prestados a externos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET192';
        $meta->nombre = 'Actividades de servicios tecnológicos organizadas y difundidas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Actividades';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS SERVICIOS TECNOLOGICOS PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET193';
        $meta->nombre = 'Prestar servicios tecnológicos de laboratorios al sector público, privado y social';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET194';
        $meta->nombre = 'Difusión y promoción de servicios tecnológicos en los sectores público, privado y social';
        $meta->descripcion = '';
        $meta->unidadmedida ='Visita';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS DESEMPEÑO A EGRESADOS PIDE
        $meta = new Metas();
        $meta->clave= 'MET195';
        $meta->nombre = 'Variación de egresados ocupados con Nivel Salarial F.';
        $meta->descripcion = '';
        $meta->unidadmedida ='Egresado';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS CENTRO DE DASARROLLO DE NEGOCIO PIDE
        $meta = new Metas();
        $meta->clave= 'MET196';
        $meta->nombre = 'Servicios de innovación, desarrollo de negocios y emprendimiento entregados a externos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Asesoría';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET197';
        $meta->nombre = 'Ingresos generados por servicios de innovación, desarrollo de negocios y emprendimiento entregados a externos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS CENTRO DE DASARROLLO DE NEGOCIO PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET198';
        $meta->nombre = 'Asesorías a Proyectos en proceso de incubación';
        $meta->descripcion = '';
        $meta->unidadmedida ='Asesoría';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET199';
        $meta->nombre = 'Asesorías en Propiedad intelectual';
        $meta->descripcion = '';
        $meta->unidadmedida ='Asesoría';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET200';
        $meta->nombre = 'Registros de marca';
        $meta->descripcion = '';
        $meta->unidadmedida ='Trámite';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET201';
        $meta->nombre = 'Desarrollo e implementación de un Programa de Cursos, Asesorías, y de Servicios de Emprendimiento';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS CERTIFICACION CONOCER PIDE
        $meta = new Metas();
        $meta->clave= 'MET202';
        $meta->nombre = 'Certificaciones de los Estándares de Competencia Laboral de CONOCER otorgadas a externos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Certificado';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET203';
        $meta->nombre = 'Ingresos generados por servicios de Certificación de Estándares de Competencia Laboral de CONOCER otorgados a externos';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET204';
        $meta->nombre = 'Proporción de egresados con al menos un Estándar de Competencia Laboral Certificado por CONOCER por promoción educativa';
        $meta->descripcion = '';
        $meta->unidadmedida ='Certificado';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS CERTIFICACION CONOCER PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET205';
        $meta->nombre = 'Cursos de alineación de estándar de competencia';
        $meta->descripcion = '';
        $meta->unidadmedida ='Curso';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET206';
        $meta->nombre = 'Entrega de certificados de competencia Laboral';
        $meta->descripcion = '';
        $meta->unidadmedida ='Trámite';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET207';
        $meta->nombre = 'Auditoría externa anual de la Entidad de Certificación y Evaluación por parte de CONOCER';
        $meta->descripcion = '';
        $meta->unidadmedida ='Auditoría';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS ADMINISTRACIÓN Y FINANZAS PIDE
        $meta = new Metas();
        $meta->clave= 'MET208';
        $meta->nombre = 'Cursos de capacitación del SGI impartidos al personal';
        $meta->descripcion = '';
        $meta->unidadmedida ='Curso';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET209';
        $meta->nombre = 'Acciones de difusión del SGI realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Capacitación';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET210';
        $meta->nombre = 'Número de mejoras implementadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET211';
        $meta->nombre = 'Número de auditorías y evaluaciones al SGI realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Auditoría Interna';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET212';
        $meta->nombre = 'Número de auditorías y evaluaciones al SGI realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Auditoría Externa';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS RECURSOS HUMANOS PIDE
        $meta = new Metas();
        $meta->clave= 'MET213';
        $meta->nombre = 'Número de cursos de capacitación administrativa ofertados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Persona';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET214';
        $meta->nombre = 'Porcentaje de personal administrativo con al menos un curso de capacitación semestral al año';
        $meta->descripcion = '';
        $meta->unidadmedida ='Persona';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET215';
        $meta->nombre = 'Personal administrativo certificado en sus funciones';
        $meta->descripcion = '';
        $meta->unidadmedida ='Persona';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS RECURSOS HUMANOS PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET216';
        $meta->nombre = 'Pago de nómina';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET217';
        $meta->nombre = 'Pago mensual de plazas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Reporte';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET218';
        $meta->nombre = 'Reporte OSFEM';
        $meta->descripcion = '';
        $meta->unidadmedida ='Reporte';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET219';
        $meta->nombre = 'Reporte Artículo 36';
        $meta->descripcion = '';
        $meta->unidadmedida ='Reporte';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET220';
        $meta->nombre = 'Trámite de pago ISR';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET221';
        $meta->nombre = 'Trámite de pago ISSEMYM';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS RECURSOS MATERIALES PIDE
        $meta = new Metas();
        $meta->clave= 'MET222';
        $meta->nombre = 'Porcentaje del presupuesto ejercido contra autorizado';
        $meta->descripcion = '';
        $meta->unidadmedida ='Porcentaje';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET223';
        $meta->nombre = 'Control de inventarios físicos anuales realizados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acta';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET224';
        $meta->nombre = 'Licitaciones públicas realizadas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Acta';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET225';
        $meta->nombre = 'Porcentaje de auditorías internas realizadas sin observaciones';
        $meta->descripcion = '';
        $meta->unidadmedida ='Porcentaje';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET226';
        $meta->nombre = 'Procesos adquisitivos. Realizados en tiempo y forma';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET227';
        $meta->nombre = 'Total de equipos y máquinas de laboratorio con más de 5 años de vida por cuatrimestre';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS RECURSOS MATERIALES PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET228';
        $meta->nombre = 'Revisar y proporcionar información al sistema IPOMEX';
        $meta->descripcion = '';
        $meta->unidadmedida ='Programa';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET229';
        $meta->nombre = 'Establecer estrategias para la recepción ordenada del formato R-GRE01';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET230';
        $meta->nombre = 'Realizar Informe entradas y salidas de almacén';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET231';
        $meta->nombre = 'Registro en el Sistema de Trazabilidad del Estado de México';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET232';
        $meta->nombre = 'Comité de Adquisiciones y Servicios';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET233';
        $meta->nombre = 'Comité de Adquisiciones, Arrendamientos y Servicios';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS MANTENIMIENTO Y SERVICIOS GNERALES PIDE
        $meta = new Metas();
        $meta->clave= 'MET234';
        $meta->nombre = 'Proporción de cubículos por PTC´s.';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET235';
        $meta->nombre = 'Salas de maestros por programa educativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET236';
        $meta->nombre = 'Cobertura de instalaciones con mantenimiento preventivo por año';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET237';
        $meta->nombre = 'Cobertura de instalaciones con mantenimiento correctivo por año';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS MANTENIMIENTO Y SERVICIOS GNERALES PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET238';
        $meta->nombre = 'Actualización de IPOMEX';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET239';
        $meta->nombre = 'Mantenimiento a infraestructura de acuerdo a los requisitos de la Norma Mexicana NMX-R-025-SCFI-2015, en Igualdad General y no Discriminación';
        $meta->descripcion = '';
        $meta->unidadmedida ='Informe';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS SISTEMAS PIDE
        $meta = new Metas();
        $meta->clave= 'MET240';
        $meta->nombre = 'Total de equipos de cómputo con más de 3 años de vida por cuatrimestre';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET241';
        $meta->nombre = 'Tasa de obsolencia de equipos de cómputo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET242';
        $meta->nombre = 'Total de equipos de cómputo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET243';
        $meta->nombre = 'Cobertura de equipos de cómputo pata PTC´s';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET244';
        $meta->nombre = 'Cobertura de equipos de cómputo para PA´s';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET245';
        $meta->nombre = 'Cobertura de equipos de cómputo para Personal Administrativo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET246';
        $meta->nombre = 'Cobertura de equipos de cómputo para Directivo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET247';
        $meta->nombre = 'Cobertura de equipos de cómputo en espacios comunes (auditorios, salas, etc.)';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET248';
        $meta->nombre = 'Total de equipos audiovisuales con más de tres años de vida por cuatrimestre';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET249';
        $meta->nombre = 'Tasa de obsolencia de equipos audiovisuales';
        $meta->descripcion = '';
        $meta->unidadmedida ='Porcentaje';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET250';
        $meta->nombre = 'Cobertura de equipos audiovisuales en aulas, laboratorios, auditorios y salas de juntas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Porcentaje';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET251';
        $meta->nombre = 'Porcentaje de equipos de cómputo con conexión a internet';
        $meta->descripcion = '';
        $meta->unidadmedida ='Porcentaje';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET252';
        $meta->nombre = 'Promedio de velocidad de conexión wifi en el campus';
        $meta->descripcion = '';
        $meta->unidadmedida ='Porcentaje';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET253';
        $meta->nombre = 'Tasa de variación en el incremento del promedio anual de velocidad de conexión wifi en el campus';
        $meta->descripcion = '';
        $meta->unidadmedida ='Porcentaje';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET254';
        $meta->nombre = 'Relación de software adquirido';
        $meta->descripcion = '';
        $meta->unidadmedida ='Software';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET255';
        $meta->nombre = 'Inventario de software instalado en equipos de cómputo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Software';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET256';
        $meta->nombre = 'Porcentaje de software con licencia utilizado en equipos de cómputo';
        $meta->descripcion = '';
        $meta->unidadmedida ='Porcentaje';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS SISTEMAS PROPIAS
        $meta = new Metas();
        $meta->clave= 'MET257';
        $meta->nombre = 'Sesiones Ordinarias Comité Interno de Gobierno Digital';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET258';
        $meta->nombre = 'Mantenimiento preventivo a Servidores';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET259';
        $meta->nombre = 'Mantenimiento preventivo a infraestructura de Señalización Digital';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET260';
        $meta->nombre = 'Mantenimiento preventivo a infraestructura de Redes';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET261';
        $meta->nombre = 'Mantenimiento preventivo a infraestructura exterior de CCTV';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET262';
        $meta->nombre = 'Mantenimiento preventivo a infraestructura de Telefonía';
        $meta->descripcion = '';
        $meta->unidadmedida ='Servicio';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET263';
        $meta->nombre = 'Presentación de la Norma Mexicana en Igualdad Laboral y No Discriminación (NMX-R-025-SCFI-2015) impartida a todo el personal adscrito al Departamento de Sistemas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Capacitación';
        $meta->programa_id = '4';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        //METAS SUBDIRECCION DE FINANZAS PIDE
        $meta = new Metas();
        $meta->clave= 'MET264';
        $meta->nombre = 'Cobertura de equipos de cómputo en aulas';
        $meta->descripcion = '';
        $meta->unidadmedida ='Equipo de Cómputo';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();

        $meta = new Metas();
        $meta->clave= 'MET265';
        $meta->nombre = 'Estados financieros dictaminados';
        $meta->descripcion = '';
        $meta->unidadmedida ='Documento';
        $meta->programa_id = '3';
        $meta->activo = '1';
        $meta->id_registro = '1';
        $meta->save();




















        
    }
}
