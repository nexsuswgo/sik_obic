<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\HutangPiutang;
use App\Models\Kategori;
use App\Models\Periode;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function laporan()
    {
        $laporan = Periode::where('status', '<>', 'Terhapus')
            ->orderBy('status', 'DESC')
            ->get();
        return view('admin.laporan', compact('laporan'));
    }

    public function laporan_transaksi($id)
    {
        $master = Periode::Find($id);
        $periode = $master->periode;
        $periode_id = $master->id;
        $transaksi = Transaksi::where('periode_id', $id)
            ->orderBy('tgl', 'ASC')
            ->get();
        $pemasukan = Transaksi::where('periode_id', $id)
            ->where('jenis', 'Pemasukan')
            ->sum('nominal');
        $pengeluaran = Transaksi::where('periode_id', $id)
            ->where('jenis', 'Pengeluaran')
            ->sum('nominal');
        $saldo = $pemasukan - $pengeluaran;
        return view('admin.laporan_transaksi', compact('transaksi', 'periode', 'periode_id', 'pemasukan', 'pengeluaran', 'saldo'));
    }

    public function laporan_hutang($id)
    {
        $master = Periode::Find($id);
        $periode = $master->periode;
        $periode_id = $master->id;
        $hutang = HutangPiutang::where('periode_id', $id)
            ->where('jenis', 'Hutang')
            ->orderBy('tgl', 'ASC')
            ->get();
        $total = HutangPiutang::where('periode_id', $id)
            ->where('jenis', 'Hutang')
            ->sum('nominal');
        return view('admin.laporan_hutang', compact('hutang', 'periode', 'periode_id', 'total'));
    }

    public function laporan_piutang($id)
    {
        $master = Periode::Find($id);
        $periode = $master->periode;
        $periode_id = $master->id;
        $piutang = HutangPiutang::where('periode_id', $id)
            ->where('jenis', 'Piutang')
            ->orderBy('tgl', 'ASC')
            ->get();
        $total = HutangPiutang::where('periode_id', $id)
            ->where('jenis', 'Hutang')
            ->sum('nominal');
        return view('admin.laporan_piutang', compact('piutang', 'periode', 'periode_id', 'total'));
    }

    public function cetak_laporan_transaksi($id)
    {
        $master = Periode::Find($id);
        $periode = $master->periode;
        $periode_id = $master->id;
        $transaksi = Transaksi::where('periode_id', $id)
            ->orderBy('tgl', 'ASC')
            ->get();
        $pemasukan = Transaksi::where('periode_id', $id)
            ->where('jenis', 'Pemasukan')
            ->sum('nominal');
        $pengeluaran = Transaksi::where('periode_id', $id)
            ->where('jenis', 'Pengeluaran')
            ->sum('nominal');
        $saldo = $pemasukan - $pengeluaran;
        return view('admin.cetak_laporan_transaksi', compact('transaksi', 'periode', 'periode_id', 'pemasukan', 'pengeluaran', 'saldo'));
    }

    public function cetak_laporan_hutang($id)
    {
        $master = Periode::Find($id);
        $periode = $master->periode;
        $periode_id = $master->id;
        $hutang = HutangPiutang::where('periode_id', $id)
            ->where('jenis', 'Hutang')
            ->orderBy('tgl', 'ASC')
            ->get();
        $total = HutangPiutang::where('periode_id', $id)
            ->where('jenis', 'Hutang')
            ->sum('nominal');
        return view('admin.cetak_laporan_hutang', compact('hutang', 'periode', 'periode_id', 'total'));
    }

    public function cetak_laporan_piutang($id)
    {
        $master = Periode::Find($id);
        $periode = $master->periode;
        $periode_id = $master->id;
        $piutang = HutangPiutang::where('periode_id', $id)
            ->where('jenis', 'Piutang')
            ->orderBy('tgl', 'ASC')
            ->get();
        $total = HutangPiutang::where('periode_id', $id)
            ->where('jenis', 'Piutang')
            ->sum('nominal');
        return view('admin.cetak_laporan_piutang', compact('piutang', 'periode', 'periode_id', 'total'));
    }
}
