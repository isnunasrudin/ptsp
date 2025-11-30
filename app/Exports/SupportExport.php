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
        $index = 1;
        return Support::whereBetween('tanggal_kunjungan', [$this->from, $this->to])->map(function ($support) use ($index) {
            return [
                'No' => $index++,
                'Nama' => $support->name,
                'Instansi' => $support->instansi,
                'Tanggal Kunjungan' => $support->tanggal_kunjungan,
                'Keperluan' => $support->keperluan,
                'Lampiran' => $support->kartu_identitas,
                'Status' => $support->status,
            ];
        });
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
