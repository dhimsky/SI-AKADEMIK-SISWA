<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Nilai;
use Illuminate\Support\Facades\Validator;

class NilaiController extends Controller
{
    public function index(){
        $siswa = Siswa::where('status_siswa', 'Aktif')->get();
        $nilai = Nilai::all();

        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $angkatans = Angkatan::all();
        return view('admin.nilai.index', compact('siswa', 'nilai', 'mapel', 'kelas', 'angkatans'));
    }

    public function nilai_perkelas($kelas_id)
    {
        $siswa = Siswa::where('status_siswa', 'Aktif')->where('kelas_id', $kelas_id)->get();
        $nilai = Nilai::where('kelas', $kelas_id)->get();
        
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $angkatans = Angkatan::all();
        return view('admin.nilai.nilai-perkelas', compact('siswa', 'nilai', 'mapel', 'kelas', 'angkatans'));
    }

    public function show($id)
    {
        // Mengambil data siswa beserta nilai-nilainya berdasarkan nis_id
        $idSiswa = $id;
        $siswa = Siswa::with(['nilai' => function($query) {
            $query->select('nis_id', 'nilai_akhir', 'ulangan_harian', 'uts', 'uas', 'tahun_pelajaran', 'kelas');
        }, 'kelas'])->findOrFail($id);
        // dd($siswa);
        // Mengambil nilai-nilai siswa yang sesuai dengan nis_id
        $nilai = Nilai::where('nis_id', $siswa->nis)->get();
        $mapel = Mapel::all();

        return view('admin.nilai.detail-nilai-siswa', compact('siswa', 'nilai', 'mapel', 'idSiswa'));
    }
    public function tambah_nilai(){
        $siswa = Siswa::where('status_siswa', 'Aktif')->get();
        $nilai = Nilai::all();
        $mapel = Mapel::all();
        return view('admin.nilai.tambah', compact('siswa', 'nilai', 'mapel'));
    }
    public function store_nilai(Request $request){
        $rules = [
            'mapel_kode' => 'required',
            'ulangan_harian' => 'required|array',
            'ulangan_harian.*' => 'nullable|integer|min:0|max:100',
            'UTS' => 'required|array',
            'UTS.*' => 'nullable|integer|min:0|max:100',
            'UAS' => 'required|array',
            'UAS.*' => 'nullable|integer|min:0|max:100',
            'nilai_akhir' => 'required|array',
            'nilai_akhir.*' => 'nullable|integer|min:0|max:100',
            'PSAJ' => 'required|array',
            'PSAJ.*' => 'nullable|integer|min:0|max:100',
        ];
        
        $messages = [
            'mapel_kode.required' => 'Mata Pelajaran tidak boleh kosong',
            'ulangan_harian.required' => 'Ulangan Harian tidak boleh kosong',
            'ulangan_harian.*.integer' => 'Ulangan Harian harus berupa angka',
            'ulangan_harian.*.min' => 'Ulangan Harian minimal 0',
            'ulangan_harian.*.max' => 'Ulangan Harian maksimal 100',
            'UTS.required' => 'UTS tidak boleh kosong',
            'UTS.*.integer' => 'UTS harus berupa angka',
            'UTS.*.min' => 'UTS minimal 0',
            'UTS.*.max' => 'UTS maksimal 100',
            'UAS.required' => 'UAS tidak boleh kosong',
            'UAS.*.integer' => 'UAS harus berupa angka',
            'UAS.*.min' => 'UAS minimal 0',
            'UAS.*.max' => 'UAS maksimal 100',
            'nilai_akhir.required' => 'Nilai Akhir tidak boleh kosong',
            'nilai_akhir.*.integer' => 'Nilai Akhir harus berupa angka',
            'nilai_akhir.*.min' => 'Nilai Akhir minimal 0',
            'nilai_akhir.*.max' => 'Nilai Akhir maksimal 100',
            'PSAJ.required' => 'PSAJ tidak boleh kosong',
            'PSAJ.*.integer' => 'PSAJ harus berupa angka',
            'PSAJ.*.min' => 'PSAJ minimal 0',
            'PSAJ.*.max' => 'PSAJ maksimal 100',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        
        foreach ($request->nis as $index => $nis) {
            
            $siswa = Siswa::findOrFail($nis);
            $cekNilai = Nilai::where('semester', $siswa->semester)
                            ->where('nis_id', $siswa->nis)
                            ->where('mapel_kode', $request->mapel_kode)
                            ->get();
            if (!$cekNilai->isEmpty()) {
                return redirect()->back()->with('error', 'Nilai ' . $siswa->nama_siswa . ' Sudah di Inputkan!');
            }
        }

        foreach ($request->nama_siswa as $index => $nama_siswa) {
            $siswa = Siswa::where('nama_siswa', $nama_siswa)->firstOrFail();

            $nilai = new Nilai();
            $nilai->nis_id = $siswa->nis;
            $nilai->mapel_kode = $request->mapel_kode;
            $nilai->semester = $siswa->semester;
            $nilai->tahun_pelajaran = $siswa->tahunpelajaran->tahun_pelajaran;
            $nilai->kelas = $siswa->kelas->nama_kelas;
            $nilai->ulangan_harian = $request->ulangan_harian[$index];
            $nilai->uts = $request->UTS[$index];
            $nilai->uas = $request->UAS[$index];
            $nilai->psaj = $request->PSAJ[$index];

            // Menghitung nilai akhir
            $nilaiUlanganHarian = $request->ulangan_harian[$index] * 0.4;
            $nilaiUts = $request->UTS[$index] * 0.3;
            $nilaiUas = $request->UAS[$index] * 0.3;
            $nilai->nilai_akhir = $nilaiUlanganHarian + $nilaiUts + $nilaiUas;

            $nilai->save();
    
        }
        return redirect()->back()->with('success', 'Nilai berhasil ditambahkan');
    }

    public function update_nilai(Request $request, $id)
    {
        $rules = [
            'ulangan_harian' => 'required',
            'uts' => 'required',
            'uas' => 'required',
        ];
        $messages = [
            'ulangan_harian.required' => 'Ulangan Harian tidak boleh kosong',
            'uts.required' => 'UTS tidak boleh kosong',
            'uas.required' => 'UAS tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $nilai = Nilai::findOrFail($id);
        // $nilaia = Nilai::findOrFail('2');
        // dd($request);
        $nilai->ulangan_harian = $request->ulangan_harian;
        $nilai->uts = $request->uts;
        $nilai->uas = $request->uas;
        $nilai->psaj = $request->psaj;
        // Mengambil data dari request dan menghitung nilai total
        $nilaiUlanganHarian = $request->ulangan_harian * 0.4;
        $nilaiUts = $request->uts * 0.3;
        $nilaiUas = $request->uas * 0.3;
        // Menjumlahkan nilai-nilai yang sudah dihitung
        $nilai->nilai_akhir = $nilaiUlanganHarian + $nilaiUts + $nilaiUas;
        $nilai->save();

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui');
    }

    public function delete_nilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai berhasil dihapus');
    }
}