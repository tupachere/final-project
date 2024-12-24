<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PemasukanExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        $pemasukanData = Pemasukan::all()->map(function ($pemasukan) {
            return [
                'No' => '',
                'Sumber Pemasukan' => $pemasukan->pemasukan ?? 'Pemasukan Tidak Ditemukan',
                'Tanggal Masuk' => $pemasukan->tgl_masuk,
                'Jumlah' => $pemasukan->jumlah,
            ];
        })->toArray();

        $total = [
            '', // Kolom Kosong untuk No
            'TOTAL', // Teks Total
            '', // Kolom Kosong untuk Tanggal Masuk
            $pemasukanData ? array_sum(array_column($pemasukanData, 'Jumlah')) : 0, // Total Jumlah
        ];

        return array_merge($pemasukanData, [$total]);
    }

    public function headings(): array
    {
        return ['No', 'Sumber Pemasukan', 'Tanggal Masuk', 'Jumlah'];
    }
}

