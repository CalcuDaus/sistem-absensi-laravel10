<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getSelectSiswa(Request $request)
    {
        $data = Siswa::join('instrukturs', 'siswas.instruktur_id', '=', 'instrukturs.id')
            ->where('instrukturs.lab', '=', $request->input('value1'))
            // Filter berdasarkan kolom 'lab'
            ->get();
        return response()->json($data);
    }
}
