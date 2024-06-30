@extends('layouts.app')
@section('tittle', 'Detail Nilai Siswa')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
                <div class="col-md-12 mb-3 text-right">
                    <a href="" class="btn btn-warning"
                        title="Cetak Nilai" target="_blank">
                        <i class="fa fa-print"></i> Cetak</a>
                    <a href="" class="btn btn-info"
                        title="Tambah Nilai" data-toggle="modal" data-target=".tambahNilai">
                        <i class="fa fa-plus"></i> Tambah</a>
                </div>
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">NO</th>
                        <th class="text-center">NAMA SISWA</th>
                        <th class="text-center">MAPEL</th>
                        <th class="text-center">SEMESTER</th>
                        <th class="text-center">TAHUN PELAJARAN</th>
                        <th class="text-center">UH</th>
                        <th class="text-center">UTS</th>
                        <th class="text-center">UAS</th>
                        <th class="text-center">NILAI AKHIR</th>
                        <th class="text-center">PSAJ</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $n)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $n->siswa->nama_siswa }}</td>
                            <td class="text-left">{{ $n->mapel->nama_mapel }}</td>
                            <td>{{ $n->tahun_pelajaran }}</td>
                            @if ($n->semester % 2 == 0)
                                <td>Genap</td>
                            @else
                                <td>Ganjil</td>
                            @endif
                            <td>{{ $n->ulangan_harian }}</td>
                            <td>{{ $n->uts }}</td>
                            <td>{{ $n->uas }}</td>
                            <td>
                                @if ($n->nilai_akhir >= 75)
                                <span class="badge badge-success">{{ $n->nilai_akhir }}</span>
                                @else
                                <span class="badge badge-warning">{{ $n->nilai_akhir }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($n->psaj >= 75)
                                <span class="badge badge-success">{{ $n->psaj }}</span>
                                @else
                                <span class="badge badge-warning">{{ $n->psaj }}</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-default btn-xs" data-toggle="modal" data-target=".editNilai{{ $n->id }}">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <form id="deleteForm{{ $n->id }}" action="{{ route('admin.delete-nilai', ['id' => $n->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-default btn-xs" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Nilai -->
                        <div class="modal fade editNilai{{ $n->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Nilai</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Nama Siswa</label>
                                                        <input disabled type="text" class="form-control" value="{{ $n->siswa->nama_siswa }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label" for="ulangan_harian">Ulangan Harian</label>
                                                        <input type="number" name="ulangan_harian" class="form-control" value="{{ $n->ulangan_harian }}" placeholder="Masukan Nilai">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label" for="uts">UTS</label>
                                                        <input type="number" name="uts" class="form-control" value="{{ $n->uts }}" placeholder="Masukan Nilai">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label" for="uas">UAS</label>
                                                        <input type="number" name="uas" class="form-control" value="{{ $n->uas }}" placeholder="Masukan Nilai">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label" for="psaj">PSAJ</label>
                                                        <input type="number" name="psaj" class="form-control" value="{{ $n->psaj }}" placeholder="Masukan Nilai">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        @foreach ($nilai as $n)
            $('#deleteForm{{ $n->id }}').submit(function(e) {
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
                        this.submit();
                    }
                });
            });
        @endforeach
    });
</script>

<div class="modal fade tambahNilai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nilai Siswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-control-label">Mata Pelajaran</label>
                                <input type="hidden" name="idSiswa" value="{{ $idSiswa }}" id="">
                                <select class="form-control select2" name="mapel_kode" id="exampleSelect">
                                    <option value="">--Pilih Mapel--</option>
                                    @foreach ($mapel as $m)
                                        <option value="{{ $m->kode_mapel }}">{{ $m->nama_mapel }}</option>
                                    @endforeach
                                </select>
                                @error('mapel_kode')
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
                                    class="form-control @error('ulangan_harian') is-invalid @enderror" value="{{ old('ulangan_harian') }}" placeholder="Masukan Nilai">
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
                                    class="form-control @error('uts') is-invalid @enderror" value="{{ old('uts') }}" placeholder="Masukan Nilai">
                                @error('uts')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="required-label faded-label" for="uas">UAS</label>
                                <input type="number" name="uas"
                                    class="form-control @error('uas') is-invalid @enderror" value="{{ old('uas') }}" placeholder="Masukan Nilai">
                                @error('uas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="required-label faded-label" for="psaj">PSAJ</label>
                                <input type="number" name="psaj"
                                    class="form-control @error('psaj') is-invalid @enderror" value="{{ old('psaj') }}" placeholder="Masukan Nilai">
                                @error('psaj')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
