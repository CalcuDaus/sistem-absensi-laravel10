<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    public function index()
    {
        $dt_sekolah = Sekolah::all();
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'dt_sekolah' => $dt_sekolah,
        ];

        return view('sekolah.V_sekolah', $data);
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
            'dt_sekolah' => ''
        ];
        return view('sekolah.V_form_sekolah', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sekolah' => 'required|min:10'
        ], [
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal 10 Huruf !',
        ]);
        if ($validator->fails()) {
            return redirect()->route('tambah.sekolah')
                ->withErrors($validator)
                ->withInput();
        }
        $query = Sekolah::create([
            'sekolah' => $request->input('sekolah')
        ]);

        if ($query) {
            return redirect()->route('sekolah')->with(['success' => 'Data Sekolah Berhasil Disimpan']);
        }
        return redirect()->route('tambah.sekolah')->withErrors($validator);
    }
    public function edit($id)
    {
        $dt_sekolah = Sekolah::findOrFail($id);
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'aksi' => 'Edit',
            'dt_sekolah' => $dt_sekolah
        ];
        return view('sekolah.V_form_sekolah', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'sekolah' => 'required|min:10',
        ], [
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal 10 Huruf !',
        ]);
        if ($validator->fails()) {
            return redirect()->route('url.edit.sekolah', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $sekolah = Sekolah::findOrFail($id);

        $query = $sekolah->update([
            'sekolah' => $request->input('sekolah')
        ]);

        if ($query) {
            return redirect()->route('sekolah')->with(['success' => 'Data Berhasil Di Ubah !']);
        }
        return redirect()->route('url.edit.sekolah')->withErrors($validator);
    }
    public function destroy($id)
    {
        $dt_sekolah = Sekolah::findOrFail($id);

        $query = $dt_sekolah->delete();

        if ($query) {
            return redirect()->route('sekolah')->with(['success' => 'Data Berhasil Di Hapus !']);
        }
        return redirect()->route('sekolah')->withErrors(['error' => 'Data Gagal Di Hapus !']);
    }
}
