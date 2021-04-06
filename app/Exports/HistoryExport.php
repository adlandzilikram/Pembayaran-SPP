<?php

namespace App\Exports;

use App\Models\History;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoryExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return History::all();
    }
    public function headings(): array
    {
        return["No", "ID Petugas", "NISN", "Tanggal", "Bulan Dibayar", "Tahun Dibayar", "ID SPP", "Jumlah Bayar", "Remeber Token", "Created at", "Update at", "Nama Petugas", "NIS", "Nama Siswa", "Kelas", "Tahun", "Nominal",];
    }
}
