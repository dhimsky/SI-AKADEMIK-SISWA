<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.siswa.index', compact('kelas'));
    }

    public function store_siswa(Request $request)
    {
        $validator = Validator::make($request->all(), Siswa::$rules, Siswa::$messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->pas_foto = $request->pas_foto;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->status_siswa = $request->status_siswa;
        if ($request->hasFile('pas_foto')) {
            $file = $request->file('pas_foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/pas_foto', $filename);
            $siswa->pas_foto = 'pas_foto/' . $filename; // Simpan path relatif ke dalam database
        }
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tgl_lahir = $request->tgl_lahir;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->kewarganegaraan = $request->kewarganegaraan;
        $siswa->no_tlp = $request->no_tlp;
        $siswa->golongan_drh = $request->golongan_drh;
        $siswa->riwayat_penyakit = $request->riwayat_penyakit;
        $siswa->kelainan_jasmani = $request->kelainan_jasmani;
        $siswa->tinggi = $request->tinggi;
        $siswa->berat_bdn = $request->berat_bdn;
        $siswa->lulusan_dari = $request->lulusan_dari;
        $siswa->tanggal_lulusan = $request->tanggal_lulusan;
        $siswa->anak_ke = $request->anak_ke;
        $siswa->jml_saudara_kandung = $request->jml_saudara_kandung;
        $siswa->jml_saudara_tiri = $request->jml_saudara_tiri;
        $siswa->jml_saudara_angkat = $request->jml_saudara_angkat;
        $siswa->status_anak = $request->status_anak;
        // $siswa->tinggal_dng = $request->tinggal_dng;
        // $siswa->jarak_kesekolah = $request->jarak_kesekolah;
        $siswa->nama_ayah_kandung = $request->nama_ayah_kandung;
        $siswa->tgl_lhr_ayah = $request->tgl_lhr_ayah;
        $siswa->agama_ayah = $request->agama_ayah;
        $siswa->kewarganegaraan_ayah = $request->kewarganegaraan_ayah;
        $siswa->pendidikan_ayah = $request->pendidikan_ayah;
        $siswa->pekerjaan_ayah = $request->pekerjaan_ayah;
        $siswa->penghasilan_bln_ayah = $request->penghasilan_bln_ayah;
        $siswa->alamat_ayah = $request->alamat_ayah;
        $siswa->tlp_ayah = $request->tlp_ayah;
        $siswa->nama_ibu_kandung = $request->nama_ibu_kandung;
        $siswa->tgl_lhr_ibu = $request->tgl_lhr_ibu;
        $siswa->agama_ibu = $request->agama_ibu;
        $siswa->kewarganegaraan_ibu = $request->kewarganegaraan_ibu;
        $siswa->pendidikan_ibu = $request->pendidikan_ibu;
        $siswa->pekerjaan_ibu = $request->pekerjaan_ibu;
        $siswa->penghasilan_bln_ibu = $request->penghasilan_bln_ibu;
        $siswa->alamat_ibu = $request->alamat_ibu;
        $siswa->tlp_ibu = $request->tlp_ibu;
        $siswa->nama_wali = $request->nama_wali;
        $siswa->tgl_lhr_wali = $request->tgl_lhr_wali;
        $siswa->agama_wali = $request->agama_wali;
        $siswa->kewarganegaraan_wali = $request->kewarganegaraan_wali;
        $siswa->pendidikan_wali = $request->pendidikan_wali;
        $siswa->pekerjaan_wali = $request->pekerjaan_wali;
        $siswa->penghasilan_bln_wali = $request->penghasilan_bln_wali;
        $siswa->alamat_wali = $request->alamat_wali;
        $siswa->tlp_wali = $request->tlp_wali;
        $siswa->save();

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
    }
}
