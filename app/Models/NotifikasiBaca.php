<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiBaca extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'dibaca',
        'notifikasi_id',
    ];
}
