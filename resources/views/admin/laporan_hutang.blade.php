@extends('home')

@section('judul')
    SIK-Obic Laporan Hutang
@endsection

@section('konten')
    <div class="container-fluid">
        <h2 class="mt-4"> Laporan Hutang {{ $periode }}</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Laporan Hutang</li>
        </ol>

        <div class="row">
                        <div class="col-xl-2 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">Rp {{ $total }}</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">Total Hutang</a>
                        <div class="small text-white"></div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.alert')

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('cetak.l.h', $periode_id) }}" target="_blank" rel="noopener noreferrer"><button
                        class="btn btn-primary btn-sm"><i class="fas fa-print"></i> Cetak Laporan</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px">#</th>
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
@endsection
