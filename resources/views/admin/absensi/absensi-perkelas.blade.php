@extends('layouts.app')
@section('tittle', 'Tabel Absensi Perkelas')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
            <div class="row">
                <div class="col-md-12 mb-3 text-right">
                    <div class="col-md-12 mb-3 text-right">
                        <form target="_blank" method="post" action="{{ route('admin.absensi-pdf', ['kelas_id' => $kelas_id]) }}" class="form-inline d-inline">
                            @csrf
                            <input type="month" name="tanggal_absensi" id="filterTanggal" required>
                            <button type="submit" class="btn btn-warning" onclick="openNewPage()"
                                title="Cetak Nilai" target="_blank">
                                <i class="fa fa-print"></i> Cetak</button>
                        </form>
                        <a href="" class="btn btn-info"
                        title="Tambah Absensi" data-toggle="modal" data-target=".tambahAbsen">
                        <i class="fa fa-plus"></i> Tambah</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover absensiTable" id="example-table" cellspacing="0"
                width="100%">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">NO</th>
                        <th class="text-center">TANGGAL ABSEN</th>
                        <th class="text-center">NAMA SISWA</th>
                        <th class="text-center">KELAS</th>
                        <th class="text-center">STATUS ABSEN</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensi as $index => $a)
                        <tr class="text-center">
                            <td>{{ $index + 1 }}</td>
                            <td class="tanggal-absensi">{{ $a->tanggal_absensi }}</td>
                            <td>{{ $a->siswa->nama_siswa }}</td>
                            <td>{{ $a->kelas }}</td>
                            <td>
                                @if ($a->status_absensi == 'M')
                                <span class="badge badge-success" style="width:19%">Masuk</span>
                                @elseif ($a->status_absensi == 'I')
                                    <span class="badge badge-info" style="width:19%">Izin</span>
                                @elseif ($a->status_absensi == 'S')
                                    <span class="badge badge-warning" style="width:19%">Sakit</span>
                                @elseif ($a->status_absensi == 'A')
                                    <span class="badge badge-danger" style="width:19%">Alpa</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-default btn-xs" data-toggle="modal" data-target=".editAbsensi{{ $a->id }}">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <form id="deleteForm" action="" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-default btn-xs" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

            @foreach ($absensi as $a)    
                <div class="modal fade editAbsensi{{ $a->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Absensi</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.update-absensi-perkelas', ['id' => $a->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="text-center">Masuk</th>
                                                <th class="text-center">Izin</th>
                                                <th class="text-center">Sakit</th>
                                                <th class="text-center">Alpa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <label class="ui-radio ui-radio-success">
                                                        <input type="radio" value="M" @if ($a->status_absensi == 'M') checked @endif name="absen">
                                                        <span class="input-span"></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <label class="ui-radio ui-radio-info">
                                                        <input type="radio" value="I" @if ($a->status_absensi == 'I') checked @endif name="absen">
                                                        <span class="input-span"></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <label class="ui-radio ui-radio-info">
                                                        <input type="radio" value="S" @if ($a->status_absensi == 'S') checked @endif name="absen">
                                                        <span class="input-span"></span></label>
                                                </td>
                                                <td class="text-center">
                                                    <label class="ui-radio ui-radio-danger">
                                                        <input type="radio" value="A" @if ($a->status_absensi == 'A') checked @endif name="absen">
                                                    <span class="input-span"></span></label>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
{{-- VALIDASI DELETE --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#deleteForm').submit(function(e){
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
<div class="modal fade tambahAbsen" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Absensi Siswa</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.store-absensi-perkelas') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-3" id="date_1">
                        <label class="font-normal">Tanggal</label>
                        <div class="input-group date">
                            <span class="input-group-addon bg-white"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="text" id="tanggal_absensi" name="tanggal_absensi">
                        </div>
                        @error('tanggal_absensi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementById('tanggal_absensi').value = today;
                        });
                    </script> --}}
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Masuk</th>
                                <th class="text-center">Izin</th>
                                <th class="text-center">Sakit</th>
                                <th class="text-center">Alpa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $index => $s)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        {{ $s->nama_siswa }}
                                        <input type="hidden" value="{{ $s->nama_siswa }}" name="nama_siswa[]"/>
                                    </td>
                                    <td class="text-center">
                                        <label class="ui-radio ui-radio-success">
                                            <input type="radio" value="M" name="absen[{{ $index }}]">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="ui-radio ui-radio-info">
                                            <input type="radio" value="I" name="absen[{{ $index }}]">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="ui-radio ui-radio-info">
                                            <input type="radio" value="S" name="absen[{{ $index }}]">
                                            <span class="input-span"></span>
                                        </label>
                                    </td>
                                    <td class="text-center">
                                        <label class="ui-radio ui-radio-danger">
                                            <input type="radio" value="A" name="absen[{{ $index }}]">
                                            <span class="input-span"></span>
                                        </label>
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
</div>

<script>
    $(document).ready(function() {
        $('#filterTanggal').on('input', function() {
            var selectedDate = $(this).val();
            $('.absensiTable tbody tr').each(function() {
                var rowDate = $(this).find('.tanggal-absensi').text();
                if (rowDate.startsWith(selectedDate)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection
