<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeriodeController extends Controller
{
    public function index()
    {
        $dt_periode = Periode::all();
        $data = [
            'title' => 'Master Data',
            'dt_periode' => $dt_periode,
        ];

        return view('periode.V_periode', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Master Data',
            'aksi' => 'Tambah',
            'dt_periode' => ''
        ];
        return view('periode.V_form_periode', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'periode' => 'required|min:10'
        ], [
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal 10 Huruf !',
        ]);
        if ($validator->fails()) {
            return redirect()->route('tambah.periode')
                ->withErrors($validator)
                ->withInput();
        }

        $query = Periode::create([
            'periode' => $request->input('periode')
        ]);

        if ($query) {
            return redirect()->route('periode')->with(['success' => 'Data periode Berhasil Disimpan']);
        }
        return redirect()->route('tambah.periode')->withErrors($validator);
    }
    public function edit($id)
    {
        $dt_periode = Periode::findOrFail($id);
        $data = [
            'title' => 'Master Data',
            'aksi' => 'Edit',
            'dt_periode' => $dt_periode
        ];
        return view('periode.V_form_periode', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'periode' => 'required|min:10',
        ], [
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal 10 Huruf !',
        ]);
        if ($validator->fails()) {
            return redirect()->route('url.edit.periode', $id)
                ->withErrors($validator)
                ->withInput();
        }
        $periode = Periode::findOrFail($id);

        $query = $periode->update([
            'periode' => $request->input('periode')
        ]);

        if ($query) {
            return redirect()->route('periode')->with(['success' => 'Data Berhasil Di Ubah !']);
        }
        return redirect()->route('url.edit.periode')->withErrors($validator);
    }
    public function destroy($id)
    {
        $dt_periode = Periode::findOrFail($id);

        $query = $dt_periode->delete();

        if ($query) {
            return redirect()->route('periode')->with(['success' => 'Data Berhasil Di Hapus !']);
        }
        return redirect()->route('periode')->withErrors(['error' => 'Data Gagal Di Hapus !']);
    }
}
