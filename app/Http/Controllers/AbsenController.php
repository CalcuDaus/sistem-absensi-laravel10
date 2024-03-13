<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Absen Siswa',
            'dt_absen' => Absen::join('siswas', 'absens.siswa_id', '=', 'siswas.id')->select('*', 'absens.created_at as waktu_absen')->get(),
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
        $siswa_id = $request->input('siswa');
        $hari_ini = Carbon::now()->format('Y-m-d');
        $absen_hari_ini = Absen::where('siswa_id', $siswa_id)->whereDate('created_at', $hari_ini)->exists();

        if (!$absen_hari_ini) {
            Absen::create([
                'siswa_id' => $siswa_id,
                'keterangan' => 'h',
                'sub_keterangan' => 'Hadir',
            ]);
            return redirect()->route('berhasil.absen');
        }
        return redirect()->route('error.absen')->with(['error' => 'Anda Sudah Melakukan Absen Hari Ini !']);
    }
}
