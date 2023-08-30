@extends('home')

@section('judul')
    SIK-Obic Debitur & Kreditur
@endsection

@section('konten')
    <div class="container-fluid">
        <h2 class="mt-4"> Debitur & Kreditur</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Debitur & Kreditur</li>
        </ol>

        @include('layouts.alert')

        <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                        class="fas fa-plus"></i> Tambah Debitur & Kreditur</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px">#</th>
                                <th class="text-center" style="width: 120px">Aksi</th>
                                <th>Nama</th>
                                <th>Nama Toko/Perusahaan</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($debit as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" data-target="#edit-{{ $item->id }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button data-toggle="modal" data-target="#hapus-{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->toko }}</td>
                                    <td>{{ $item->jenis }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('debit.s') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama:</label>
                                    <input required type="text" maxlength="25" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Toko/Perusahaan:</label>
                                    <input required type="text" maxlength="25" class="form-control" name="toko">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Jenis:</label>
                                    <select required name="jenis" class="form-control">
                                        <option value=""></option>
                                        <option value="Debitur">Debitur</option>
                                        <option value="Kreditur">Kreditur</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    @foreach ($debit as $item)
        <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('debit.u', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama:</label>
                                        <input required type="text" value="{{ $item->name }}" maxlength="25"
                                            class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Toko/Perusahaan:</label>
                                        <input required type="text" value="{{ $item->toko }}" maxlength="25"
                                            class="form-control" name="toko">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Jenis:</label>
                                        <select required name="jenis" class="form-control">
                                            <option value="{{ $item->jenis }}">{{ $item->jenis }}</option>
                                            <option value="Debitur">Debitur</option>
                                            <option value="Kreditur">Kreditur</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- MODAL HAPUS --}}
    @foreach ($debit as $item)
        <div class="modal fade" id="hapus-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('debit.d', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin Ingin Menghapus :</p>
                            <h6>{{ $item->name }}</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
