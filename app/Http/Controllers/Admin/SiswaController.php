<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaImport;
use App\Models\TahunPelajaran;
use App\Models\User;
use App\Models\UserImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $siswas = Siswa::where('status_siswa', 'Aktif')->get();
        $nonsiswas = Siswa::where('status_siswa', 'Tidak Aktif')->get();
        $angkatans = Angkatan::all();
        $tahunpelajaran = TahunPelajaran::all();
        return view('admin.siswa.index', compact('kelas', 'siswas', 'nonsiswas', 'angkatans', 'tahunpelajaran'));
    }

    public function nonsiswa()
    {
        $kelas = Kelas::all();
        $siswas = Siswa::where('status_siswa', 'Aktif')->get();
        $nonsiswas = Siswa::where('status_siswa', 'Tidak Aktif')->get();
        $angkatans = Angkatan::all();
        $tahunpelajaran = TahunPelajaran::all();
        return view('admin.siswa.tidak-aktif', compact('kelas', 'siswas', 'nonsiswas', 'angkatans', 'tahunpelajaran'));
    }

    public function store_siswa(Request $request)
    {
        $validator = Validator::make($request->all(), Siswa::$rules, Siswa::$messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $akun = new User();
        $akun->kode_identitas = $request->nis;
        $akun->nama_lengkap = $request->nama_siswa;
        $akun->role_id = 3;
        $akun->password = Hash::make('abcd1234');
        $akun->save();

        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nisn = $request->nisn;
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->semester = $request->semester;
        $siswa->angkatan_id = $request->angkatan_id;
        $siswa->tahunpelajaran_id = $request->tahunpelajaran_id;
        $siswa->status_siswa = $request->status_siswa;
        $siswa->save();

        return redirect()->back()->with('success', 'Siswa berhasil ditambahkan');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls',
        ]);
        $file = $request->file('excel_file');

        try {
            Excel::import(new UserImport(), $file);
            Excel::import(new SiswaImport(), $file);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            return back()->withFailures($failures);
        }
        return redirect()->back()->with('success', 'Data siswa berhasil diimpor.');
    }

    public function update_siswa(Request $request, $id)
    {
        $rules = [
            'nama_siswa' => 'required',
            'kelas_id' => 'required|exists:kelas,nama_kelas',
            'angkatan_id' => 'required|exists:angkatan,kode_angkatan',
            'status_siswa' => 'required',
        ];
        
        $messages = [
            'nis.required' => 'NIS tidak boleh kosong!',
            'nisn.required' => 'NISN tidak boleh kosong!',
            'nis.unique' => 'NIS sudah digunakan!',
            'nisn.unique' => 'NISN sudah digunakan!',
            'nama_siswa.required' => 'Nama siswa tidak boleh kosong!',
            'kelas_id.required' => 'Kelas tidak boleh kosong!',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid!',
            'angkatan_id.required' => 'Angkatan tidak boleh kosong!',
            'angkatan_id.exists' => 'Angkatan yang dipilih tidak valid!',
            'status_siswa.required' => 'Status siswa tidak boleh kosong!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        // update ke tabel user
        $akun = User::findOrFail($id);
        if ($request->password == null) {

        }else {
            // dd($request->password);
            $akun->password = Hash::make($request->password);
        }
        $akun->save();

        $siswa = Siswa::findOrFail($id);
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->semester = $request->semester;
        $siswa->angkatan_id = $request->angkatan_id;
        $siswa->tahunpelajaran_id = $request->tahunpelajaran_id;
        $siswa->status_siswa = $request->status_siswa;
        $siswa->save();

        return redirect()->back()->with('success', 'Siswa berhasil diperbarui');
    }

    public function delete_siswa($nisn)
    {
        $siswa = Siswa::findOrFail($nisn);
        $siswa->delete();
        $akun = User::findOrFail($nisn);
        $akun->delete();

        return redirect()->back()->with('success', 'Siswa berhasil dihapus');
    }
}