<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $dt_sekolah = Sekolah::count();
        $data = [
            'title' => 'Dashboard',
            'sekolah' => $dt_sekolah
        ];

        return view('V_dashboard', $data);
    }
}
