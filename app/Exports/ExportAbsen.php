<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportAbsen implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $id_ins = auth()->user()->instruktur_user_id;
        $data = Absen::join('siswas', 'absens.siswa_id', '=', 'siswas.id')
            ->join('instrukturs', 'siswas.instruktur_id', '=', 'instrukturs.id')
            ->select(
                'siswas.nama as nama',
                'absens.keterangan as keterangan',
                'absens.sub_keterangan as sub_keterangan',
                'absens.created_at as waktu_absen'
            )
            ->where('instrukturs.id', '=', $id_ins)
            ->get();
        return $data;
    }
}
