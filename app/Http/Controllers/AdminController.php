<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $dt_sekolah = Sekolah::count();
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Dashboard',
            'sekolah' => $dt_sekolah,
        ];

        return view('V_dashboard', $data);
    }
}
