<?php
  
namespace App\Exports;
  
use App\Models\Usuarios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;



class UsuariosExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Usuarios::select("clave", "nombre", "app","apm","app","gen","academico","email")->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Clave", "Nombre", "Apellido Paterno", "Apellido Materno", "Genero", "Academico", "Email"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
  
                $event->sheet->getDelegate()->getStyle('A1:G1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('007A37');

                        $event->sheet->getColumnDimension('A')->setWidth(8);
                        $event->sheet->getColumnDimension('B')->setWidth(17);
                        $event->sheet->getColumnDimension('C')->setWidth(17); 
                        $event->sheet->getColumnDimension('D')->setWidth(17);
                        $event->sheet->getColumnDimension('E')->setWidth(8);
                        $event->sheet->getColumnDimension('F')->setWidth(46); 
                        $event->sheet->getColumnDimension('G')->setWidth(36);  
  
            },
        ];
    }


}