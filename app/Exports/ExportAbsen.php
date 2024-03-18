<?php

namespace App\Exports;

use App\Models\Absen;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportAbsen implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $id_ins = auth()->user()->instruktur_user_id;
        $data = Absen::join('siswas', 'absens.siswa_id', '=', 'siswas.id')
            ->join('instrukturs', 'siswas.instruktur_id', '=', 'instrukturs.id')
            ->select('absens.*', 'siswas.nama as nama', 'absens.created_at as waktu_absen')
            ->where('instrukturs.id', '=', $id_ins)
            ->get();
        return view('table', ['absen' => $data]);
    }
}
