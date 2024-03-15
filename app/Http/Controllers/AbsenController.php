<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Instruktur;
use App\Models\Notifikasi;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    public function index()
    {
        $id_ins = auth()->user()->instruktur_user_id;
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);
        $data = [
            'title' => 'Absen Siswa',
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'dt_absen' => Absen::join('siswas', 'absens.siswa_id', '=', 'siswas.id')
                ->join('instrukturs', 'siswas.instruktur_id', '=', 'instrukturs.id')
                ->select('absens.*', 'siswas.nama as nama', 'absens.created_at as waktu_absen')
                ->where('instrukturs.id', '=', $id_ins)
                ->get()
        ];
        return view('absen.V_absen', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sekolah' => 'required',
            'jurusan' => 'required',
            'siswa' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('lab')
                ->withErrors($validator)
                ->withInput();
        }
        $siswa_id = $request->input('siswa');
        $hari_ini = Carbon::now()->format('Y-m-d');
        $absen_hari_ini = Absen::where('siswa_id', $siswa_id)->whereDate('created_at', $hari_ini)->exists();

        if (!$absen_hari_ini) {
            Absen::create([
                'siswa_id' => $siswa_id,
                'keterangan' => 'h',
                'sub_keterangan' => 'Hadir',
            ]);
            return redirect()->route('berhasil.absen');
        }
        return redirect()->route('error.absen')->with(['error' => 'Anda Sudah Melakukan Absen Hari Ini !']);
    }
    public function instrukturStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sekolah' => 'required',
            'jurusan' => 'required',
            'siswa' => 'required',
            'keterangan' => 'required',
            'sub_keterangan' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('absen.instruktur')
                ->withErrors($validator)
                ->withInput();
        }
        $siswa_id = $request->input('siswa');
        $hari_ini = Carbon::now()->format('Y-m-d');

        // Cek apakah siswa sudah melakukan absen hari ini
        $absen_hari_ini = Absen::where('siswa_id', $siswa_id)->whereDate('created_at', $hari_ini)->exists();

        // Jika belum melakukan absen hari ini
        if (!$absen_hari_ini) {
            $siswa = Siswa::find($siswa_id);
            $notif_instruktur_id = Instruktur::find($siswa->instruktur_id);

            // Lakukan absen
            Absen::create([
                'siswa_id' => $siswa_id,
                'keterangan' => $request->input('keterangan'),
                'sub_keterangan' => $request->input('sub_keterangan'),
            ]);

            // Hitung jumlah absen alpha
            $siswa_melanggar_alpha = Absen::where('siswa_id', $siswa_id)->where('keterangan', 'a')->count();
            $sudah_notif_alpha = Notifikasi::where('notif_siswa_id', $siswa_id)->where('kategori_id', 3)->count();

            // Buat notifikasi jika absen alpha lebih dari dua kali
            if ($siswa_melanggar_alpha >= 2 && $sudah_notif_alpha < 1) {
                Notifikasi::create([
                    'judul' => "Siswa Dengan Nama $siswa->nama Telah Alpha Lebih Dari Dua Kali",
                    'kategori_id' => 3,
                    'notif_instruktur_id' => $notif_instruktur_id->id,
                    'notif_siswa_id' => $siswa_id
                ]);
            }

            // Hitung jumlah absen izin
            $siswa_melanggar_izin = Absen::where('siswa_id', $siswa_id)->where('keterangan', 'i')->count();
            $sudah_notif_izin = Notifikasi::where('notif_siswa_id', $siswa_id)->where('kategori_id', 1)->count();

            // Buat notifikasi jika absen izin lebih dari dua kali
            if ($siswa_melanggar_izin >= 2 && $sudah_notif_izin < 1) {
                Notifikasi::create([
                    'judul' => "Siswa Dengan Nama $siswa->nama Telah Izin Lebih Dari Dua Kali",
                    'kategori_id' => 1,
                    'notif_instruktur_id' => $notif_instruktur_id->id,
                    'notif_siswa_id' => $siswa_id
                ]);
            }

            // Hitung jumlah absen sakit
            $siswa_melanggar_sakit = Absen::where('siswa_id', $siswa_id)->where('keterangan', 's')->count();
            $sudah_notif_sakit = Notifikasi::where('notif_siswa_id', $siswa_id)->where('kategori_id', 2)->count();

            // Buat notifikasi jika absen sakit lebih dari dua kali
            if ($siswa_melanggar_sakit >= 3  && $sudah_notif_sakit < 1) {
                Notifikasi::create([
                    'judul' => "Siswa Dengan Nama $siswa->nama Telah Sakit Lebih Dari Dua Kali",
                    'kategori_id' => 2,
                    'notif_instruktur_id' => $notif_instruktur_id->id,
                    'notif_siswa_id' => $siswa_id
                ]);
            }

            return redirect()->route('absen')->with(['success' => 'Absen Siswa Berhasil']);
        }

        return redirect()->route('absen')->with(['error' => 'Siswa Tersebut Sudah Melakukan Absen Hari Ini !']);
    }
    public function dataSiswa()
    {
        $dt_notifikasi = getNotif(auth()->user()->instruktur_user_id);
        $count_notif = getNotifCount(auth()->user()->instruktur_user_id);

        $dt_siswa = Siswa::join('instrukturs', 'siswas.instruktur_id', '=', 'instrukturs.id')
            ->join('sekolahs', 'siswas.sekolah_id', '=', 'sekolahs.id')
            ->join('periodes', 'siswas.periode_id', '=', 'periodes.id')
            ->join('jurusans', 'siswas.jurusan_id', '=', 'jurusans.id')
            ->select(
                'nis',
                'gelombang',
                'sekolah',
                'periode',
                'jurusan',
                'siswas.id as id_siswa',
                'instrukturs.nama as nama_instruktur',
                'siswas.nama as nama_siswa',
            )
            ->where('siswas.instruktur_id', '=', auth()->user()->instruktur_user_id)
            ->get();

        $data = [
            'dt_notifikasi' => $dt_notifikasi,
            'c_notif' => $count_notif,
            'title' => 'Data Siswa',
            'dt_siswa' => $dt_siswa,
        ];


        return view('siswa.V_siswa', $data);
    }
    public function destroy($id)
    {
        $dt_absen = Absen::findOrFail($id);

        $query = $dt_absen->delete();

        if ($query) {
            return redirect()->route('absen')->with(['success' => 'Data Berhasil Di Hapus !']);
        }
        return redirect()->route('absen')->withErrors(['error' => 'Data Gagal Di Hapus !']);
    }
}
