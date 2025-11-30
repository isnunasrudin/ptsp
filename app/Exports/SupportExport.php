<?php

namespace App\Exports;

use App\Models\Support;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SupportExport implements FromCollection, WithHeadings
{
    public $from;
    public $to;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Support::whereBetween('tanggal_kunjungan', [$this->from, $this->to])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Instansi',
            'Tanggal Kunjungan',
            'Keperluan',
            'Lampiran',
            'Status',
        ];
    }
}
