<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AkunController extends Controller
{
    public function index()
    {
        $dt_user = User::where('level', '=', 'instruktur')->get();
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'dt_user' => $dt_user,
        ];

        return view('akun.V_akun', $data);
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
            'dt_user' => '',
            'dt_instruktur' => Instruktur::all()
        ];
        return view('akun.V_form_akun', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:4',
            'email' => 'email|required|min:4',
            'password' => 'required',
            'instruktur' => 'required'
        ], [
            'email' => 'Format :attribute Harus Berupa Email @ !',
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal :min Huruf !',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambah.akun')
                ->withErrors($validator)
                ->withInput();
        }

        $query = User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'level' => 'instruktur',
            'instruktur_user_id' => intval($request->input('instruktur'))
        ]);

        if ($query) {
            return redirect()->route('akun')->with(['success' => 'Data user Berhasil Disimpan']);
        }
        return redirect()->route('tambah.akun')->withErrors($validator);
    }
    public function edit($id)
    {
        $dt_user = User::findOrFail($id);
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Master Data',
            'aksi' => 'Edit',
            'dt_user' => $dt_user
        ];
        return view('akun.V_form_akun', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'email' => 'email|required|min:5',
            'password' => 'required',
        ], [
            'email' => 'Format :attribute Harus Berupa Email @ !',
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal :min Huruf !',
        ]);


        if ($validator->fails()) {
            return redirect()->route('url.edit.akun', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($id);

        $query = $user->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($query) {
            return redirect()->route('akun')->with(['success' => 'Data Berhasil Di Ubah !']);
        }
        return redirect()->route('url.edit.akun')->with(['error' => 'Data Gagal Di Ubah !']);
    }
    public function destroy($id)
    {
        $dt_user = User::findOrFail($id);

        $query = $dt_user->delete();

        if ($query) {
            return redirect()->route('akun')->with(['success' => 'Data Berhasil Di Hapus !']);
        }
        return redirect()->route('akun')->withErrors(['error' => 'Data Gagal Di Hapus !']);
    }
}
