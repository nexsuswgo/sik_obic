@extends('home')

@section('judul')
    SIK-Obic Rekening Bank
@endsection

@section('konten')
    <div class="container-fluid">
        <h2 class="mt-4"> Rekening Bank</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Rekening Bank</li>
        </ol>

        @include('layouts.alert')

        <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                        class="fas fa-plus"></i> Tambah Rekening Bank</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px">#</th>
                                <th class="text-center" style="width: 120px">Aksi</th>
                                <th>Nama Bank</th>
                                <th>Nama Pemilik</th>
                                <th>No Rekening</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" data-target="#edit-{{ $item->id }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button data-toggle="modal" data-target="#hapus-{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                    <td>{{ $item->bank }}</td>
                                    <td>{{ $item->pemilik }}</td>
                                    <td>{{ $item->no_rekening }}</td>
                                    <td>{{ $item->saldo }}</td>
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
                <form action="{{ route('bank.s') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Bank</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama Bank:</label>
                                    <input required type="text" maxlength="25" class="form-control" name="bank">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nama Pemilik:</label>
                                    <input required type="text" maxlength="25" class="form-control" name="pemilik">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">No Rekening:</label>
                                    <input required type="number" class="form-control" name="no_rekening">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Saldo:</label>
                                    <input required type="number" class="form-control" name="saldo">
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
    @foreach ($bank as $item)
        <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('bank.u', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Bank:</label>
                                        <input required type="text" maxlength="25" class="form-control"
                                            value="{{ $item->bank }}" name="bank">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nama Pemilik:</label>
                                        <input required type="text" maxlength="25" class="form-control"
                                            value="{{ $item->pemilik }}" name="pemilik">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">No Rekening:</label>
                                        <input required type="number" class="form-control"
                                            value="{{ $item->no_rekening }}" name="no_rekening">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Saldo:</label>
                                        <input required type="number" class="form-control" value="{{ $item->saldo }}"
                                            name="saldo">
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
    @foreach ($bank as $item)
        <div class="modal fade" id="hapus-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('bank.d', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Bank</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin Ingin Menghapus :</p>
                            <h6>{{ $item->kategori }}</h6>
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
