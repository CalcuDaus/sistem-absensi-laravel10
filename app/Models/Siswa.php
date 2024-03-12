<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'gelombang',
        'instruktur_id',
        'sekolah_id',
        'jurusan_id',
        'periode_id',
    ];

    public function instruktur()
    {
        return $this->hasMany(Instruktur::class);
    }

    public function sekolah()
    {
        return $this->hasMany(Sekolah::class);
    }

    public function jurusan()
    {
        return $this->hasMany(Jurusan::class);
    }

    public function periode()
    {
        return $this->hasMany(Periode::class);
    }
}
