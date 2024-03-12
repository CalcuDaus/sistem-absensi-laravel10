<?php

namespace App\Http\Controllers;

use App\Models\Instruktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstrukturController extends Controller
{
    public function index()
    {
        $dt_instruktur = Instruktur::all();
        $data = [
            'title' => 'Master Data',
            'dt_instruktur' => $dt_instruktur,
        ];

        return view('instruktur.V_instruktur', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Master Data',
            'aksi' => 'Tambah',
            'dt_instruktur' => ''
        ];
        return view('instruktur.V_form_instruktur', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|required|min:5',
            'nama' => 'required|min:5',
            'lab' => 'required'
        ], [
            'email' => 'Format :attribute Harus Berupa Email @ !',
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal :min Huruf !',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambah.instruktur')
                ->withErrors($validator)
                ->withInput();
        }

        $query = Instruktur::create([
            'email' => $request->input('email'),
            'nama' => $request->input('nama'),
            'lab' => $request->input('lab')
        ]);

        if ($query) {
            return redirect()->route('instruktur')->with(['success' => 'Data instruktur Berhasil Disimpan']);
        }
        return redirect()->route('tambah.instruktur')->withErrors($validator);
    }
    public function edit($id)
    {
        $dt_instruktur = Instruktur::findOrFail($id);
        $data = [
            'title' => 'Master Data',
            'aksi' => 'Edit',
            'dt_instruktur' => $dt_instruktur
        ];
        return view('instruktur.V_form_instruktur', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'email|required|min:5',
            'nama' => 'required|min:5',
            'lab' => 'required'
        ], [
            'email' => 'Format :attribute Harus Berupa Email @ !',
            'required' => 'Nama :attribute Harus Diisi !',
            'min' => 'Nama :attribute Minimal :min Huruf !',
        ]);

        if ($validator->fails()) {
            return redirect()->route('url.edit.instruktur', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $instruktur = Instruktur::findOrFail($id);

        $query = $instruktur->update([
            'email' => $request->input('email'),
            'nama' => $request->input('nama'),
            'lab' => $request->input('lab')
        ]);

        if ($query) {
            return redirect()->route('instruktur')->with(['success' => 'Data Berhasil Di Ubah !']);
        }
        return redirect()->route('url.edit.instruktur')->with(['error' => 'Data Gagal Di Ubah !']);
    }
    public function destroy($id)
    {
        $dt_instruktur = Instruktur::findOrFail($id);

        $query = $dt_instruktur->delete();

        if ($query) {
            return redirect()->route('instruktur')->with(['success' => 'Data Berhasil Di Hapus !']);
        }
        return redirect()->route('instruktur')->withErrors(['error' => 'Data Gagal Di Hapus !']);
    }
}
