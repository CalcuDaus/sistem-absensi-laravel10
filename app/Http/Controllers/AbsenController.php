<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'absen'
        ];

        return view('V_absen', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sekolah' => 'required',
            'jurusan' => 'required',
            'siswa' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('lab')
                ->withErrors($validator)
                ->withInput();
        }
        $query = Absen::create([
            'siswa_id' => $request->input('siswa'),
            'keterangan' => 'h',
            'sub_keterangan' => 'Hadir',
        ]);

        if ($query) {
            return redirect()->route('berhasil.absen');
        }
        return redirect()->route('lab');
    }
}
