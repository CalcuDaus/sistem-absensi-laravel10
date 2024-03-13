<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function index()
    {
        $id_ins = auth()->user()->instruktur_user_id;
        $data = [
            'title' => 'Absen Siswa',
            'dt_absen' => Absen::join('siswas', 'absens.siswa_id', '=', 'siswas.id')
                ->join('instrukturs', 'siswas.instruktur_id', '=', 'instrukturs.id')
                ->select('absens.*', 'siswas.nama as nama', 'absens.created_at as waktu_absen')
                ->where('instrukturs.id', '=', $id_ins)
                ->get()
        ];
        return view('absen.V_absen', $data);
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
    public function instrukturStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sekolah' => 'required',
            'jurusan' => 'required',
            'siswa' => 'required',
            'keterangan' => 'required',
            'sub_keterangan' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('absen.instruktur')
                ->withErrors($validator)
                ->withInput();
        }
        $siswa_id = $request->input('siswa');
        $hari_ini = Carbon::now()->format('Y-m-d');
        $absen_hari_ini = Absen::where('siswa_id', $siswa_id)->whereDate('created_at', $hari_ini)->exists();

        if (!$absen_hari_ini) {
            Absen::create([
                'siswa_id' => $siswa_id,
                'keterangan' => $request->input('keterangan'),
                'sub_keterangan' => $request->input('sub_keterangan'),
            ]);
            return redirect()->route('absen')->with(['success' => 'Absen Siswa Berhasil']);
        }
        return redirect()->route('absen')->with(['error' => 'Siswa Tersebut Sudah Melakukan Absen Hari Ini !']);
    }
}
