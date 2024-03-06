<?php
  
namespace App\Exports;
  
use App\Models\AreasUsuarios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;



class AreasUsExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AreasUsuarios::select('tb_areasusuarios.id_areasusuarios','tb_areas.nombre as nombreA', 'tb_usuarios.nombre as nombreU','tb_usuarios.app','tb_usuarios.apm','tb_usuarios.email AS correo')
        ->join('tb_areas','tb_areas.id_area','tb_areasusuarios.area_id')
        ->join('tb_usuarios','tb_usuarios.id_usuario','tb_areasusuarios.usuario_id')
        ->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "Area", "Nombre","Apellido Paterno","Apellido Materno","Correo"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
  
                $event->sheet->getDelegate()->getStyle('A1:F1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('007A37');

                        $event->sheet->getColumnDimension('A')->setWidth(5);
                        $event->sheet->getColumnDimension('B')->setWidth(45);
                        $event->sheet->getColumnDimension('C')->setWidth(17);  
                        $event->sheet->getColumnDimension('D')->setWidth(25); 
                        $event->sheet->getColumnDimension('E')->setWidth(25); 
                        $event->sheet->getColumnDimension('F')->setWidth(25); 
  
            },
        ];
    }

}