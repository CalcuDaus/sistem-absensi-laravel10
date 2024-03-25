<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{

    private $gelombang, $instruktur, $sekolah, $jurusan, $periode;
    public function __construct($gelombang, $instruktur, $sekolah, $jurusan, $periode)
    {
        $this->gelombang = $gelombang;
        $this->instruktur = $instruktur;
        $this->sekolah = $sekolah;
        $this->jurusan = $jurusan;
        $this->periode = $periode;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row['nis'],
            'nama' =>  $row['nama'],
            'gelombang' => $this->gelombang,
            'instruktur_id' => $this->instruktur,
            'sekolah_id' => $this->sekolah,
            'jurusan_id' => $this->jurusan,
            'periode_id' => $this->periode,
        ]);
    }
}
