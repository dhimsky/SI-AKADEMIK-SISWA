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
        $siswa = Siswa::all();
        $nilai = Nilai::all();

        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $angkatans = Angkatan::all();
        return view('admin.nilai.index', compact('siswa', 'nilai', 'mapel', 'kelas', 'angkatans'));
    }
    public function show($id)
    {
        // Mengambil data siswa beserta nilai-nilainya berdasarkan nis_id
        $idSiswa = $id;
        $siswa = Siswa::with(['nilai' => function($query) {
            $query->select('nis_id', 'nilai_akhir', 'ulangan_harian', 'uts', 'uas', 'tahun_pelajaran', 'kelas');
        }, 'kelas'])->findOrFail($id);

        // Mengambil nilai-nilai siswa yang sesuai dengan nis_id
        $nilai = Nilai::where('nis_id', $siswa->nis)->get();
        $mapel = Mapel::all();

        return view('admin.nilai.detail-nilai-siswa', compact('siswa', 'nilai', 'mapel', 'idSiswa'));
    }
    public function tambah_nilai(){
        $siswa = Siswa::all();
        $nilai = Nilai::all();
        $mapel = Mapel::all();
        return view('admin.nilai.tambah', compact('siswa', 'nilai', 'mapel'));
    }
    public function store_nilai(Request $request){
        // dd($request);
        $rules = [
            'mapel_kode' => 'required',
            'ulangan_harian' => 'required',
            'uts' => 'required',
            'uas' => 'required',
            'psaj' => 'required',
        ];
        $messages = [
            'mapel_kode.required' => 'Mata Pelajaran tidak boleh kosong',
            'ulangan_harian.required' => 'Ulangan Harian tidak boleh kosong',
            'uts.required' => 'UTS tidak boleh kosong',
            'uas.required' => 'UAS tidak boleh kosong',
            'psaj.required' => 'PSAJ tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }
        $siswa = Siswa::findOrFail($request->idSiswa);
        $nilai = new Nilai();
        $nilai->nis_id = $siswa->nis;
        $nilai->mapel_kode = $request->mapel_kode;
        $nilai->semester = $siswa->semester;
        $nilai->tahun_pelajaran = $siswa->tahunpelajaran->tahun_pelajaran;
        $nilai->kelas = $siswa->kelas->nama_kelas;
        $nilai->ulangan_harian = $request->ulangan_harian;
        $nilai->uts = $request->uts;
        $nilai->uas = $request->uas;
        $nilai->psaj = $request->psaj;
        $nilai->status = 'Tertunda';
        // Mengambil data dari request dan menghitung nilai total
        $nilaiUlanganHarian = $request->ulangan_harian * 0.4;
        $nilaiUts = $request->uts * 0.3;
        $nilaiUas = $request->uas * 0.3;
        // Menjumlahkan nilai-nilai yang sudah dihitung
        $nilai->nilai_akhir = $nilaiUlanganHarian + $nilaiUts + $nilaiUas;
        $nilai->save();

        return redirect()->back()->with('success', 'Nilai berhasil ditambahkan');
    }

    public function update_nilai(Request $request, $id)
    {
        // dd($request);
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

        $nilai = Nilai::where('nis_id' ,$request->idSiswa)->first();
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

    public function publish_nilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->status = 'Diterbitkan';
        $nilai->save();

        return redirect()->back()->with('success', 'Nilai berhasil diterbitkan');
    }

    public function delete_nilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->back()->with('success', 'Nilai berhasil dihapus');
    }
}