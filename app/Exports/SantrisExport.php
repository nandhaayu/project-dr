<?php

namespace App\Exports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SantrisExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Santri::select(
            'nama',
            'nik',
            'tempat_lahir',
            'tanggal_lahir',
            'no_hp',
            'jenis_kelamin',
            'nama_orangtua',
            'kurikulum',
            'alamat',
            'harapan',
            'tanggal_masuk'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'No HP',
            'Jenis Kelamin',
            'Nama Orangtua',
            'Kurikulum',
            'Alamat',
            'Harapan',
            'Tanggal Masuk',
        ];
    }
}

