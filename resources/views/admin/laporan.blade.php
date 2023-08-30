@extends('home')

@section('judul')
    SIK-Obic Laporan
@endsection

@section('konten')
    <div class="container-fluid">
        <h2 class="mt-4"> Laporan</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"> Laporan</li>
        </ol>

        @include('layouts.alert')

        <div class="card mb-4">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px">#</th>
                                <th class="text-center" style="width: 120px">Status</th>
                                <th>Periode Data</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        @if ($item->status == 'Aktif')
                                            <span class="text text-info">Proses</span>
                                        @else
                                            <span class="text text-danger">Sudah</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->periode }}</td>
                                    <td>
                                        <a href="{{route('laporan.t', $item->id)}}"><button class="btn btn-primary btn-sm"><i
                                                    class="fas fa-list"></i> Transaksi</button></a>
                                        <a href="{{route('laporan.h', $item->id)}}"><button class="btn btn-primary btn-sm"><i
                                                    class="fas fa-list"></i> Hutang</button></a>
                                        <a href="{{route('laporan.p', $item->id)}}"><button class="btn btn-primary btn-sm"><i
                                                    class="fas fa-list"></i> Piutang</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
