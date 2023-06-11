<?php
  
namespace App\Exports;
  
use App\Models\AreasMetas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use Maatwebsite\Excel\Events\AfterSheet;


class AreasMetasExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AreasMetas::select('tb_areasmetas')
        ->join('tb_programas', 'tb_areasmetas.id_programa', 'tb_programas.id_programa')
        ->join('tb_metas', 'tb_areasmetas.meta_id', 'tb_metas.id_meta')
        ->join('tb_areas', 'tb_areasmetas.area_id',  'tb_areas.id_area')
        ->select('tb_areas.nombre as area', 'tb_programas.nombre as pnombre', 'tb_metas.nombre as nmeta',   'tb_areasmetas.objetivo as objetivo')
        ->orderBy('tb_areasmetas.id_areasmetas', 'asc')
        ->get();
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Area", "Programa", "Meta","Objetivo"];
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
  
                $event->sheet->getDelegate()->getStyle('A1:D1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('007A37');

                        $event->sheet->getColumnDimension('A')->setWidth(30);
                        $event->sheet->getColumnDimension('B')->setWidth(39);
                        $event->sheet->getColumnDimension('C')->setWidth(141);
                        $event->sheet->getColumnDimension('D')->setWidth(15);   
  
            },
        ];
    }



}