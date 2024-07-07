@extends('layouts.app')
@section('tittle', 'Detail Nilai Siswa')
@section('content')
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-body">
                <div class="col-md-12 mb-3 text-right">
                    <form action="{{ route('admin.nilaiakhir_pdf', ['id' => $siswa->nis]) }}" target="_blank" method="post" class="form-inline d-inline">
                        @csrf
                        <select id="semesterFilter" name="semester" class="form-control">
                            <option selected value="">Pilih Semester</option>
                            <option value="1">Satu (1)</option>
                            <option value="2">Dua (2)</option>
                            <option value="3">Tiga (3)</option>
                            <option value="4">Empat (4)</option>
                            <option value="5">Lima (5)</option>
                            <option value="6">Enam (6)</option>
                        </select>
                        <button type="submit" class="btn btn-warning" onclick="openNewPage()"
                            title="Cetak Nilai" target="_blank">
                            <i class="fa fa-print"></i> Cetak</button>
                    </form>
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
                <tbody id="nilaiTable">
                    @foreach ($nilai as $n)
                        <tr class="text-center nilai-row" data-semester="{{ $n->semester }}">
                            <td>{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $n->siswa->nama_siswa }}</td>
                            <td class="text-left">{{ $n->mapel->nama_mapel }}</td>
                            {{-- @if ($n->semester % 2 == 0)
                                <td>Genap</td>
                            @else
                                <td>Ganjil</td>
                            @endif --}}
                            <td>{{ $n->semester }}</td>
                            <td>{{ $n->tahun_pelajaran }}</td>
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
                            {{-- <td>
                                @if ($n->status == 'Tertunda')
                                    <span class="badge badge-danger">{{ $n->status }}</span>
                                @else
                                <span class="badge badge-primary">{{ $n->status }}</span>
                                @endif
                            </td> --}}
                            <td class="">
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
                                {{-- @if ($n->status != 'Diterbitkan')
                                    <form action="{{ route('admin.publish-nilai', ['id' => $n->id]) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-default btn-xs">
                                            <i class="fa fa-upload"></i>
                                        </button>
                                    </form>
                                @endif --}}
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
                                        <form id="updateForm{{ $n->id }}" action="{{ route('admin.update-nilai', ['id' => $n->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label class="form-control-label">Nama Siswa</label>
                                                        <input type="hidden" name="idSiswa" value="{{ $idSiswa }}" id="">
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
                                        <button type="submit" id="editButton{{ $n->id }}" class="btn btn-primary">Update</button>
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
<script>
    $(document).ready(function() {
    @foreach ($nilai as $n)
        $('#editButton{{ $n->id }}').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda ingin mengubah nilai?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#updateForm{{ $n->id }}').submit();
                }
            });
        });
    @endforeach
});
</script>
<script>
    document.getElementById('semesterFilter').addEventListener('change', function() {
        var semester = this.value;
        console.log(semester);
        var rows = document.querySelectorAll('.nilai-row');
        rows.forEach(function(row) {
            if (semester === "" || row.dataset.semester === semester) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
    $('#tambahButton').click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah Anda ingin menambah nilai?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#tambahForm').submit();
            }
        });
    });
});
</script>
@include('validasi.validasi-edit')
@include('validasi.notifikasi-berhasil')
@endsection