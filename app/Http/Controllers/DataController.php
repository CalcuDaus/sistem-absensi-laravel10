<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getSelectSiswa(Request $request)
    {
        $data = Siswa::where('sekolah_id', $request->input('value1'))->where('jurusan_id', $request->input('value2'))->get();

        return response()->json($data);
    }
}
