@extends('home')

@section('judul')
    SIK-Obic Catatan Hutang
@endsection

@section('konten')
    <div class="container-fluid">
        <h2 class="mt-4"> Catatan Hutang</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Catatan Hutang</li>
            <li class="breadcrumb-item active"> {{ $periode }}</li>
        </ol>

        @include('layouts.alert')

        <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                        class="fas fa-plus"></i> Tambah Catatan Hutang</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px">#</th>
                                <th class="text-center" style="width: 120px">Aksi</th>
                                <th>Kode </th>
                                <th>Tanggal</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hutang as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" data-target="#edit-{{ $item->id }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button data-toggle="modal" data-target="#hapus-{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                    <td>{{ $item->kode }}</td>
                                    <td>{{ $item->tgl }}</td>
                                    <td>{{ $item->nominal }}</td>
                                    <td>{{ $item->keterangan }}</td>
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
                <form action="{{ route('hutang.s') }}" method="POST">
                    @csrf
                    <input type="hidden" name="periode_id" value="{{ $periode_id }}">
                    <input type="hidden" name="kode" value="HTG-{{ $kode }}">
                    <input type="hidden" name="jenis" value="Hutang">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Hutang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Tanggal:</label>
                                    <input required type="date" class="form-control" name="tgl">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nominal (Rp):</label>
                                    <input required type="number" class="form-control" name="nominal">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                    <textarea required maxlength="100" class="form-control" name="keterangan"cols="60" rows="4"></textarea>
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
    @foreach ($hutang as $item)
        <div class="modal fade" id="edit-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('hutang.u', $item->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="periode_id" value="{{ $item->periode_id }}">
                        <input type="hidden" name="kode" value="{{ $item->kode }}">
                        <input type="hidden" name="jenis" value="{{ $item->jenis }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Hutang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Tanggal:</label>
                                        <input required type="date" class="form-control" name="tgl"
                                            value="{{ $item->tgl }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nominal (Rp):</label>
                                        <input required type="number" class="form-control" name="nominal"
                                            value="{{ $item->nominal }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                        <textarea required maxlength="100" class="form-control" name="keterangan"cols="60" rows="4">{{ $item->keterangan }}</textarea>
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
    @foreach ($hutang as $item)
        <div class="modal fade" id="hapus-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('hutang.d', $item->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Hutang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin Ingin Menghapus :</p>
                            <h6>{{ $item->kode }}</h6>
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
