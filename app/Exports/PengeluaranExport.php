<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengeluaranExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        $pengeluaranData = Pengeluaran::all()->map(function ($pengeluaran) {
            return [
                'No' => '',
                'Pengeluaran' => $pengeluaran->pengeluaran ?? 'Pengeluaran Tidak Ditemukan',
                'Tanggal Keluar' => $pengeluaran->tgl_keluar,
                'Jumlah' => $pengeluaran->jumlah,
            ];
        })->toArray();

        $total = [
            '', // Kolom Kosong untuk No
            'TOTAL', // Teks Total
            '', // Kolom Kosong untuk Tanggal Keluar
            $pengeluaranData ? array_sum(array_column($pengeluaranData, 'Jumlah')) : 0, // Total Jumlah
        ];

        return array_merge($pengeluaranData, [$total]);
    }

    public function headings(): array
    {
        return ['No', 'Pengeluaran', 'Tanggal Keluar', 'Jumlah'];
    }
}


