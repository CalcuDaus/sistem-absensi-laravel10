<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'judul',
        'kategori_id',
        'notif_instruktur_id',
        'notif_siswa_id',
    ];
}
