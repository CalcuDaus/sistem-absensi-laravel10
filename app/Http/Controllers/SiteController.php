<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\NotifikasiBaca;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    public function index()
    {
        return view('V_login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => ':attribute Wajib Diisi !',
            'password.required' => ':attribute Wajib Diisi !',
        ]);

        if ($validator->fails()) {
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput();
        }

        $info_login = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::attempt($info_login)) {
            return redirect()->route('dashboard')->with(['success' => 'Login Berhasil']);
        }
        return redirect()->route('home')->with(['error' => 'Username atau Password Anda Salah !']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function lab(Request $request)
    {
        // $clientIP = ip2long($request->getClientIp());
        // $startIP = ip2long('192.168.55.1');
        // $endIP = ip2long('192.168.55.255');

        // if ($clientIP < $startIP || $clientIP > $endIP) {
        //     return redirect()->route('error.lokasi');
        // }


        $data = [
            'title' => 'Sistem Absensi',
            'dt_sekolah' => Sekolah::all(),
            'dt_jurusan' => Jurusan::all(),
            'dt_siswa' => Siswa::all()
        ];

        return view('absen.V_form_absensi', $data);
    }
    public function instrukturAbsen()
    {
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Sistem Absensi',
            'dt_sekolah' => Sekolah::all(),
            'dt_jurusan' => Jurusan::all(),
            'dt_siswa' => Siswa::all()
        ];

        return view('absen.V_form_absen_instruktur', $data);
    }
    public function notifStore(Request $request)
    {
        NotifikasiBaca::create([
            'dibaca' => 1,
            'notifikasi_id' => $request->notif_id,
            'notifikasi_user_id' => auth()->user()->id
        ]);
        return redirect($request->url);
    }
    public function success()
    {
        return view('absen.V_absen_berhasil');
    }
    public function lokasi()
    {
        return view('absen.V_error_lokasi');
    }
    public function absenError()
    {
        return view('absen.V_error_absen');
    }
}
