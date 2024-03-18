<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use App\Models\Jurusan;
use App\Models\Notifikasi;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $dt_sekolah = Sekolah::count();
        $dt_siswa = Siswa::count();
        $dt_jurusan = Jurusan::count();
        $dt_instruktur = Instruktur::count();
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $dt_siswa_instruktur = Siswa::where('instruktur_id', '=', auth()->user()->instruktur_user_id)->get()->count();
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Dashboard',
            'sekolah' => $dt_sekolah,
            'jurusan' => $dt_jurusan,
            'siswa' => $dt_siswa,
            'instruktur' => $dt_instruktur,
            'data_siswa' => $dt_siswa_instruktur,
        ];

        return view('V_dashboard', $data);
    }
}
