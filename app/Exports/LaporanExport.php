<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $tahun;
    protected $bulan;

    public function __construct($tahun, $bulan)
    {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }

    public function collection()
    {
        return Report::where('status', 'Selesai')
            ->whereYear('created_at', $this->tahun)
            ->whereMonth('created_at', $this->bulan)
            ->get(['nama', 'email', 'jenis_laporan', 'tempat_kejadian', 'tanggal_kejadian', 'status']);
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Jenis Laporan',
            'Tempat Kejadian',
            'Tanggal Kejadian',
            'Status',
        ];
    }
}
