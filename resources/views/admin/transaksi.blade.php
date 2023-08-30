@extends('home')

@section('judul')
    SIK-Obic Keuangan
@endsection

@section('konten')
    <div class="container-fluid">
        <h2 class="mt-4"> Keuangan</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Keuangan</li>
        </ol>

        @include('layouts.alert')

        <div class="card mb-4">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i
                        class="fas fa-plus"></i> Tambah Keuangan</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px">#</th>
                                <th class="text-center" style="width: 120px">Aksi</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <button data-toggle="modal" data-target="#info-{{ $item->id }}"
                                            class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></button>
                                        <button data-toggle="modal" data-target="#edit-{{ $item->id }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button data-toggle="modal" data-target="#hapus-{{ $item->id }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </td>
                                    <td>{{ $item->tgl }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->nominal }}</td>
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
                <form action="{{ route('transaksi.s') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="periode_id" value="{{$periode_id}}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
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
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Kategori:</label>
                                    <select required class="form-control" name="kategori_id">
                                        <option value=""></option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->bulan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Jenis:</label>
                                    <select required class="form-control" name="jenis">
                                        <option value=""></option>
                                        <option value="Pemasukan">Pemasukan</option>
                                        <option value="Pengeluaran">Pengeluaran</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                    <textarea required class="form-control" name="keterangan" maxlength="100" cols="30" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Pilih Rekening:</label>
                                    <select required class="form-control" name="bank_id">
                                        <option value=""></option>
                                        @foreach ($bank as $item)
                                            <option value="{{ $item->id }}">{{ $item->no_rekening }} |
                                                {{ $item->bank }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nominal (Rp):</label>
                                    <input required type="number" class="form-control" name="nominal">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">File Transaksi:</label>
                                    <input required type="file" accept=".pdf, .png, .jpg" class="form-control"
                                        name="file">
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
    @foreach ($transaksi as $edit)
        <div class="modal fade" id="edit-{{ $edit->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('transaksi.u', $edit->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="periode_id" value="{{$edit->periode_id}}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Transaksi</h5>
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
                                            value="{{ $edit->tgl }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Kategori:</label>
                                        <select required class="form-control" name="kategori_id"">
                                            <option value="{{ $edit->kategori_id }}">{{ $edit->kategori_->kategori }}
                                            </option>
                                            @foreach ($kategori as $kat)
                                                <option value="{{ $kat->id }}">{{ $kat->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Jenis:</label>
                                        <select required class="form-control" name="jenis">
                                            <option value="{{ $edit->jenis }}">{{ $edit->jenis }}</option>
                                            <option value="Pemasukan">Pemasukan</option>
                                            <option value="Pengeluaran">Pengeluaran</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Keterangan:</label>
                                        <textarea required class="form-control" name="keterangan" maxlength="100" cols="30" rows="1">{{ $edit->keterangan }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Pilih Rekening:</label>
                                        <select required class="form-control" name="bank_id">
                                            <option value="{{ $edit->bank_id }}">{{ $edit->bank_->no_rekening }} |
                                                {{ $edit->bank_->bank }}</option>
                                            @foreach ($bank as $banks)
                                                <option value="{{ $banks->id }}">{{ $banks->no_rekening }} |
                                                    {{ $banks->bank }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nominal (Rp):</label>
                                        <input required type="number" class="form-control" name="nominal"
                                            value="{{ $edit->nominal }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">File Transaksi:</label>
                                        <input type="file" accept=".pdf, .png, .jpg" class="form-control"
                                            name="file">
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
    @foreach ($transaksi as $hapus)
        <div class="modal fade" id="hapus-{{ $hapus->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <form action="{{ route('transaksi.d', $hapus->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus Transaksi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin Ingin Menghapus Transaksi Tanggal :</p>
                            {{-- <h6>{{ $hapus->tgl->format('d-m-Y') }}</h6> --}}
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

    {{-- MODAL INFO --}}
    @foreach ($transaksi as $info)
        <div class="modal fade" id="info-{{ $info->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Info Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <p><span class="text text-secondary">Tanggal :</span> {{ $info->tgl }}</p>
                                <p><span class="text text-secondary">Kategori :</span> {{ $info->kategori_->kategori }}
                                </p>
                                <p><span class="text text-secondary">Jenis :</span> {{ $info->jenis }}</p>
                                <p><span class="text text-secondary">Keterangan :</span> {{ $info->keterangan }}</p>
                            </div>
                            <div class="col-6">
                                <p><span class="text text-secondary">Periode Data :</span>
                                    {{ $info->periode_->periode }}</p>
                                <p><span class="text text-secondary">Rekening Bank :</span>
                                    {{ $info->bank_->no_rekening }} | {{ $info->bank_->bank }}</p>
                                <p><span class="text text-secondary">Nominal :</span> Rp {{ $info->nominal }}</p>
                                <p><span class="text text-secondary">File Transaksi :</span> <a
                                        href="{{ asset($info->file) }}"><button class="btn btn-info btn-sm"><i
                                                class="fas fa-download"></i> Download</button></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
