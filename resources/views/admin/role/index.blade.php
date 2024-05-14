@extends('layouts.app')
@section('tittle', 'Tabel Role')
@section('content')
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table Role</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID ROLE</th>
                            <th>LEVEL</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($role as $item)
                            <tr class="text-center">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->level }}</td>
                                <td>
                                    <button class="btn btn-default btn-xs m-r-5" data-toggle="modal"
                                        data-target=".editRole{{ $item->id }}" title="Edit role"><i
                                            class="fa fa-pencil font-14"></i></button>
                                </td>
                            </tr>

                            {{-- modal edit --}}
                            <div class="modal fade editRole{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Role</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.update-role', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="id">Id Role</label>
                                                    <input type="number" name="id" value="{{ $item->id }}"
                                                        class="form-control @error('id') is-invalid @enderror" readonly>
                                                    @error('id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="required-label faded-label" for="level">Level
                                                        Role</label>
                                                    <input type="text" name="level" value="{{ $item->level }}"
                                                        class="form-control @error('level') is-invalid @enderror"
                                                        placeholder="Masukan nama role">
                                                    @error('level')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @include('validasi.validasi-edit')
                            @include('validasi.notifikasi-berhasil')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
