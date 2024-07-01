<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    public function index(){
        $siswa = Siswa::where('status_siswa', 'Aktif')->get();
        $kelas = Kelas::all();
        return view('admin.absensi.index', compact('siswa', 'kelas'));
    }
    public function show($kelas_id){
        $kelas_id = $kelas_id;
        $siswa = Siswa::where('kelas_id', $kelas_id)
                ->orderBy('nama_siswa')
                ->get();
                $absensi = Absensi::where('kelas', $kelas_id)->get();
                
        return view('admin.absensi.absensi-perkelas', compact('siswa', 'absensi', 'kelas_id'));
    }

    public function store(Request $request)
    {
        // dd($request->tanggal_absensi);
        $rules = [
            'tanggal_absensi' => 'required|date',
            'nama_siswa' => 'required',
            'absen' => 'required',
            'absen.*' => 'in:M,I,S,A', // Memastikan bahwa setiap nilai absen adalah salah satu dari 'M', 'I', 'S', atau 'A'
        ];
    
        // Pesan kesalahan opsional
        $messages = [
            'tanggal_absensi.required' => 'Tanggal absensi wajib diisi.',
            'tanggal_absensi.date' => 'Tanggal absensi tidak valid.',
            'nama_siswa.required' => 'Nama siswa wajib diisi.',
            'absen.required' => 'Absensi wajib diisi.',
            'absen.*.in' => 'Nilai absen tidak valid.',
        ];
    
        // Buat validator
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Periksa validasi
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        // Loop melalui setiap siswa dan simpan absensi mereka
        foreach ($request->nama_siswa as $index => $nama_siswa) {
            $siswa = Siswa::where('nama_siswa', $nama_siswa)->first();
            // dd($siswa->tahunpelajaran->tahun_pelajaran);
            if ($siswa) {
                // Konversi tanggal ke format 'Y-m-d'
                $tanggalAbsensi = Carbon::createFromFormat('m/d/Y', $request->tanggal_absensi)->format('Y-m-d');
                Absensi::create([
                    'nis_id' => $siswa->nis,
                    'tanggal_absensi' => $tanggalAbsensi,
                    'status_absensi' => $request->absen[$index],
                    'semester' => $siswa->semester,
                    'kelas' => $siswa->kelas_id,
                    'tahun_pelajaran' => $siswa->tahunpelajaran->tahun_pelajaran,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Absen berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'absen' => 'required',
            'absen.*' => 'in:M,I,S,A', // Memastikan bahwa setiap nilai absen adalah salah satu dari 'M', 'I', 'S', atau 'A'
        ];
    
        // Pesan kesalahan opsional
        $messages = [
            'absen.required' => 'Absensi wajib diisi.',
            'absen.*.in' => 'Nilai absen tidak valid.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $absensi = Absensi::findOrFail($id);
        $absensi->status_absensi = $request->absen;
        $absensi->save();
        
        return redirect()->back()->with('success', 'Absen berhasil diperbarui');
    }

    public function delete($id)
    {
        $absensi = Absensi::findOrfail($id);
        $absensi->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}