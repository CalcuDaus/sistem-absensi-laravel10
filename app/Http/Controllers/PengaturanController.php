<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'Pengaturan'
        ];

        return view('V_pengaturan', $data);
    }
}
