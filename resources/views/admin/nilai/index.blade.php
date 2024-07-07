@extends('layouts.app')
@section('tittle', 'Tabel Nilai Siswa')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-body">
                <div class="row">
                    @foreach ($kelas as $k)
                    <div class="col-lg-4 col-md-4 mt-3">
                        <div class="ibox bg-success color-white widget-stat">
                            <div class="ibox-body">
                                <h2 class="m-b-5 font-strong">{{ $k->nama_kelas }}</h2>
                                <div class="m-b-3 mr-5">{{ $k->jurusan->nama_jurusan }}</div><a href="{{ route('admin.nilai-perkelas', ['kelas_id' => $k->nama_kelas]) }}" class="ti-arrow-right text-light widget-stat-icon"></a>
                                <div></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">NO</th>
                            <th class="text-center">NIS</th>
                            <th class="text-center">NAMA SISWA</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            @foreach ($siswa as $n)
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $n->nis }}</td>                           
                            <td class="text-left">{{ $n->nama_siswa }}</td>                           
                            <td class="text-center">{{ $n->kelas->nama_kelas }}</td>                           
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('admin.siswa.nilai', ['id' => $n->nis]) }}">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
{{-- @extends('layouts.app')
@section('tittle', 'Tabel Nilai Siswa')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="col-md-9 mt-4 text-right">
                    <form action="" method="GET">
                        <div class="row mb-3">
                            <div class="col-md-4 mb-2">
                                <select id="kelas_id" name="kelas_id" class="form-control">
                                    <option selected value="">Semua Kelas</option>
                                    @foreach ($kelas as $k)
                                    <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <select id="angkatan_id" name="angkatan_id" class="form-control">
                                    <option selected value="">Semua Angkatan</option>
                                    @foreach ($angkatans as $a)
                                    <option value="{{ $a->kode_angkatan }}">{{ $a->tahun_angkatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button id="btnFilter" class="btn btn-whatsapp"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-1 text-right ">
                    <a href="{{ route('admin.tambah-nilai') }}" class="btn btn-info"
                        title="Tambah Nilai">
                        <i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                    width="100%">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">NO</th>
                            <th class="text-center">NAMA SISWA</th>
                            <th class="text-center">MAPEL</th>
                            <th class="text-center">TAHUN PELAJARAN</th>
                            <th class="text-center">KELAS</th>
                            <th class="text-center">ULANGAN HARIAN</th>
                            <th class="text-center">UTS</th>
                            <th class="text-center">UAS</th>
                            <th class="text-center">NILAI AKHIR</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            @foreach ($nilai as $n)
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $n->siswa->nama_siswa }}</td>
                            <td class="text-left">{{ $n->mapel->nama_mapel }}</td>
                            <td class="text-center">{{ $n->tahun_pelajaran }}</td>
                            <td class="text-center">{{ $n->kelas }}</td>
                            <td class="text-center">{{ $n->ulangan_harian }}</td>
                            <td class="text-center">{{ $n->uts }}</td>
                            <td class="text-center">{{ $n->uas }}</td>
                            <td class="text-center">
                                @if ($n->nilai_akhir >= 75)
                                    <span class="badge badge-success badge-pill m-r-5 m-b-5">{{ $n->nilai_akhir }}</span>
                                @else
                                    <span class="badge badge-warning badge-pill m-r-5 m-b-5">{{ $n->nilai_akhir }}</span>
                                @endif
                            </td>                            
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('admin.nilaiakhir_pdf', ['id' => $n->nis_id]) }}" class="btn btn-default btn-xs m-r-5" target="_blank"><i
                                    class="fa fa-print font-14"></i></a>
                                <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                    data-target=".editNilai{{ $n->id }}" title="Edit Siswa"><i
                                        class="fa fa-pencil font-14"></i></button>
                                <form id="deleteForm{{ $n->id }}" action="{{ route('admin.delete-nilai', ['id' => $n->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-default btn-xs" type="submit" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                                </form>
                            </td>
                        </tr>

                        {{-- MODAL EDIT --}}
                        {{-- <div class="modal fade editNilai{{ $n->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Nilai</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.update-nilai', ['id' => $n->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Nama Siswa</label>
                                                        <input disabled type="text" name="nisn_id" class="form-control @error('value') is-invalid @enderror" value="{{ $n->siswa->nama_siswa }}">
                                                        @error('nisn_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="ulangan_harian">Ulangan Harian</label>
                                                        <input type="number" name="ulangan_harian"
                                                            class="form-control @error('ulangan_harian') is-invalid @enderror" value="{{ $n->ulangan_harian }}" placeholder="Masukan Nilai">
                                                        @error('ulangan_harian')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="uts">UTS</label>
                                                        <input type="number" name="uts"
                                                            class="form-control @error('uts') is-invalid @enderror" value="{{ $n->uts }}" placeholder="Masukan Nilai">
                                                        @error('uts')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="required-label faded-label" for="uas">Nilai</label>
                                                        <input type="number" name="uas"
                                                            class="form-control @error('uas') is-invalid @enderror" value="{{ $n->uas }}" placeholder="Masukan Nilai">
                                                        @error('uas')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}

                        {{-- VALIDASI DELETE --}}
                        {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            $(document).ready(function(){
                                $('#deleteForm{{ $n->id }}').submit(function(e){
                                    e.preventDefault();
                                    Swal.fire({
                                        title: 'Apakah Anda yakin?',
                                        text: "Anda tidak akan dapat mengembalikan ini!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, hapus saja!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Submit form manually
                                            this.submit();
                                        }
                                    });
                                });
                            });
                        </script>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection --}}
