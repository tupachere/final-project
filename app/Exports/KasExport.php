<?php

namespace App\Exports;

use App\Models\Kas;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KasExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        $kasData = Kas::with('anggota')->get()->map(function ($kas) {
            return [
                'ID' => $kas->id_anggota,
                'Nama' => $kas->anggota->nama ?? 'Nama Tidak Ditemukan',
                'Jumlah' => $kas->jumlah,
                'Tanggal' => $kas->tgl_kas,
            ];
        })->toArray();

        $total = [
            '', // Kolom Kosong untuk ID
            'TOTAL', // Teks Total
            $kasData ? array_sum(array_column($kasData, 'Jumlah')) : 0, // Total Kolom Jumlah
            '', // Kolom Kosong untuk Tanggal
        ];

        // Gabungkan data kas dengan total
        return array_merge($kasData, [$total]);
    }

    public function headings(): array
    {
        return ['ID', 'Nama', 'Jumlah', 'Tanggal'];
    }
}
