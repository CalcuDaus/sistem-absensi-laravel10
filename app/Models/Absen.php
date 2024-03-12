<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'siswa_id',
        'keterangan',
        'sub_keterangan'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
