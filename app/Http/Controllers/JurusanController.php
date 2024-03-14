<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index()
    {
        $dt_jurusan = Jurusan::all();
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'dt_jurusan' => $dt_jurusan,
        ];

        return view('jurusan.V_jurusan', $data);
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
            'dt_jurusan' => ''
        ];
        return view('jurusan.V_form_jurusan', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jurusan' => 'required|min:10'
        ], [
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal 10 Huruf !',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambah.jurusan')
                ->withErrors($validator)
                ->withInput();
        }

        $query = Jurusan::create([
            'jurusan' => $request->input('jurusan')
        ]);

        if ($query) {
            return redirect()->route('jurusan')->with(['success' => 'Data jurusan Berhasil Disimpan']);
        }
        return redirect()->route('tambah.jurusan')->withErrors($validator);
    }
    public function edit($id)
    {
        $dt_jurusan = Jurusan::findOrFail($id);
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'aksi' => 'Edit',
            'dt_jurusan' => $dt_jurusan
        ];
        return view('jurusan.V_form_jurusan', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'jurusan' => 'required|min:10',
        ], [
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal 10 Huruf !',
        ]);
        if ($validator->fails()) {
            return redirect()->route('url.edit.jurusan', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $jurusan = Jurusan::findOrFail($id);

        $query = $jurusan->update([
            'jurusan' => $request->input('jurusan')
        ]);

        if ($query) {
            return redirect()->route('jurusan')->with(['success' => 'Data Berhasil Di Ubah !']);
        }
        return redirect()->route('url.edit.jurusan')->withErrors($validator);
    }
    public function destroy($id)
    {
        $dt_jurusan = Jurusan::findOrFail($id);

        $query = $dt_jurusan->delete();

        if ($query) {
            return redirect()->route('jurusan')->with(['success' => 'Data Berhasil Di Hapus !']);
        }
        return redirect()->route('jurusan')->withErrors(['error' => 'Data Gagal Di Hapus !']);
    }
}
