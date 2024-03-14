<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\Jurusan;
use App\Models\Periode;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $dt_siswa = Siswa::join('instrukturs', 'siswas.instruktur_id', '=', 'instrukturs.id')
            ->join('sekolahs', 'siswas.sekolah_id', '=', 'sekolahs.id')
            ->join('periodes', 'siswas.periode_id', '=', 'periodes.id')
            ->join('jurusans', 'siswas.jurusan_id', '=', 'jurusans.id')
            ->select(
                'nis',
                'gelombang',
                'sekolah',
                'periode',
                'jurusan',
                'siswas.id as id_siswa',
                'instrukturs.nama as nama_instruktur',
                'siswas.nama as nama_siswa',
            )
            ->get();
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'dt_siswa' => $dt_siswa,
        ];


        return view('siswa.V_siswa', $data);
    }
    public function create()
    {
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);

        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'aksi' => 'Tambah',
            'dt_siswa' => '',
            'dt_sekolah' => Sekolah::all(),
            'dt_jurusan' => Jurusan::all(),
            'dt_periode' => Periode::all(),
            'dt_instruktur' => Instruktur::all()
        ];
        return view('siswa.V_form_siswa', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|min:6|unique:siswas,nis',
            'nama' => 'required',
            'gelombang' => 'required',
            'instruktur' => 'required',
            'sekolah' => 'required',
            'jurusan' => 'required',
            'periode' => 'required'
        ], [
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal 10 Huruf !',
            'unique' => ':attribute Telah Terdaftar !'
        ]);
        if ($validator->fails()) {
            return redirect()->route('tambah.siswa')
                ->withErrors($validator)
                ->withInput();
        }
        $query = Siswa::create([
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'gelombang' => $request->input('gelombang'),
            'lab' => $request->input('lab'),
            'instruktur_id' => $request->input('instruktur'),
            'sekolah_id' => $request->input('sekolah'),
            'jurusan_id' => $request->input('jurusan'),
            'periode_id' => $request->input('periode'),
        ]);

        if ($query) {
            return redirect()->route('siswa')->with(['success' => 'Data siswa Berhasil Disimpan']);
        }
    }
    public function edit($id)
    {
        $dt_siswa = Siswa::findOrFail($id);
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);

        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'aksi' => 'Edit',
            'dt_siswa' => $dt_siswa,
            'dt_sekolah' => Sekolah::all(),
            'dt_jurusan' => Jurusan::all(),
            'dt_periode' => Periode::all(),
            'dt_instruktur' => Instruktur::all()
        ];
        return view('siswa.V_form_siswa', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|min:6',
            'nama' => 'required',
            'gelombang' => 'required',
            'instruktur' => 'required',
            'sekolah' => 'required',
            'jurusan' => 'required',
            'periode' => 'required'
        ], [
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal 10 Huruf !',
        ]);
        if ($validator->fails()) {
            return redirect()->route('url.edit.siswa', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $siswa = Siswa::findOrFail($id);

        $query = $siswa->update([
            'nis' => $request->input('nis'),
            'nama' => $request->input('nama'),
            'gelombang' => $request->input('gelombang'),
            'lab' => $request->input('lab'),
            'instruktur_id' => $request->input('instruktur'),
            'sekolah_id' => $request->input('sekolah'),
            'jurusan_id' => $request->input('jurusan'),
            'periode_id' => $request->input('periode'),
        ]);

        if ($query) {
            return redirect()->route('siswa')->with(['success' => 'Data Berhasil Di Ubah !']);
        }
        return redirect()->route('url.edit.siswa')->withErrors($validator);
    }
    public function destroy($id)
    {
        $dt_siswa = Siswa::findOrFail($id);

        $query = $dt_siswa->delete();

        if ($query) {
            return redirect()->route('siswa')->with(['success' => 'Data Berhasil Di Hapus !']);
        }
        return redirect()->route('siswa')->withErrors(['error' => 'Data Gagal Di Hapus !']);
    }
}
