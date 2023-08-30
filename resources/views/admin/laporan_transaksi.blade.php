@extends('home')

@section('judul')
SIK-Obic Laporan Transaksi
@endsection

@section('konten')
<div class="container-fluid">
    <h2 class="mt-4"> Laporan Transaksi {{ $periode }}</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"> Laporan Transaksi</li>
    </ol>

    <div class="row">
        <div class="col-xl-2 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Rp {{ $pemasukan }}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Pemasukan</a>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Rp {{ $pengeluaran }}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Pengeluaran</a>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">Rp {{ $saldo }}</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Saldo Transaksi</a>
                    <div class="small text-white"></div>
                </div>
            </div>
        </div>
         
    </div>

    @include('layouts.alert')

    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('cetak.l.t', $periode_id)}}" target="_blank" rel="noopener noreferrer"><button class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak Laporan</button></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px">#</th>
                            <th class="text-center" style="width: 50px">Aksi</th>
                            <th>Tanggal</th>
                            <th>Kategori</th>
                            <th>Keterangan</th>
                            <th>Jenis</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#info-{{ $item->id }}" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></button>
                            </td>
                            <td>{{ $item->tgl }}</td>
                            <td>{{ $item->kategori_->kategori }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->jenis }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- MODAL INFO --}}
@foreach ($transaksi as $info)
<div class="modal fade" id="info-{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <p><span class="text text-secondary">File Transaksi :</span> <a href="{{ asset($info->file) }}"><button class="btn btn-info btn-sm"><i class="fas fa-download"></i> Download</button></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form action="{{ route('sinkron', 2) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sinkronkan Ke Rekening</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                 Yakin?
                        <input required type="hidden" maxlength="25" class="form-control" value="{{$saldo}}" name="nominal">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Sinkronkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
