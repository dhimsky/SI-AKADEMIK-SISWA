@extends('layouts.app')
@section('tittle', 'Nilai Siswa Perkelas')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
            <div class="row">
                <div class="col-md-12 mb-3 text-right">
                    <div class="col-md-12 mb-3 text-right">
                        <a href="" class="btn btn-info" title="Tambah Nilai" data-toggle="modal" data-target=".tambahNilai"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                </div>
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
                        @foreach ($nilai as $n)
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $n->nis_id }}</td>                           
                        <td class="text-left">{{ $n->siswa->nama_siswa }}</td>                           
                        <td class="text-center">{{ $n->kelas }}</td>                           
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('guru.siswa.nilai', ['id' => $n->nis_id]) }}">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade tambahNilai" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nilai Siswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('guru.siswa-nilai-store') }}" method="POST">
                    @csrf
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Ulangan Harian</th>
                                <th class="text-center">UTS</th>
                                <th class="text-center">UAS</th>
                                <th class="text-center">Nilai Akhir</th>
                                <th class="text-center">PSAJ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $index => $n)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        {{ $n->nama_siswa }}
                                        <input type="hidden" value="{{ $n->nis }}" name="nis[]"/>
                                        <input type="hidden" value="{{ $n->nama_siswa }}" name="nama_siswa[]"/>
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="ulangan_harian[{{ $index }}]"
                                            class="form-control @error('ulangan_harian.' . $index) is-invalid @enderror" value="">
                                        @error('ulangan_harian.' . $index)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="UTS[{{ $index }}]"
                                            class="form-control @error('UTS.' . $index) is-invalid @enderror" value="">
                                        @error('UTS.' . $index)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="UAS[{{ $index }}]"
                                            class="form-control @error('UAS.' . $index) is-invalid @enderror" value="">
                                        @error('UAS.' . $index)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="nilai_akhir[{{ $index }}]"
                                            class="form-control @error('nilai_akhir.' . $index) is-invalid @enderror" value="">
                                        @error('nilai_akhir.' . $index)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                    <td class="text-center">
                                        <input type="number" name="PSAJ[{{ $index }}]"
                                            class="form-control @error('PSAJ.' . $index) is-invalid @enderror" value="">
                                        @error('PSAJ.' . $index)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection