<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Kas;
use App\Models\Periode;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function transaksi()
    {
        $master = Periode::where('status', 'Aktif')->first();
        $periode = $master->periode;
        $periode_id = $master->id;
        $transaksi = Transaksi::all();
        $bank = Bank::all();
        $kategori = Kas::all();
        return view('admin.transaksi', compact('transaksi', 'periode', 'periode_id', 'bank', 'kategori'));
    }

    public function transaksi_store(Request $request)
    {
        // dd($request->all());
        $file = $request->file;
        $new_file = 'file' . time() . $file->getClientOriginalName();
        $file->move('file/transaksi/', $new_file);
        Transaksi::create([
            'kategori_id' => $request->kategori_id,
            'bank_id' => $request->bank_id,
            'tgl' => $request->tgl,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'nominal' => $request->nominal,
            'periode_id' => $request->periode_id,
            'file' => 'file/transaksi/' . $new_file,
        ]);
        $idb = $request->bank_id;
        $nominal = $request->nominal;

        $bank = Bank::Find($idb);
        $saldo_awal = $bank->saldo;
        $debit = $saldo_awal+$nominal;
        $kredit = $saldo_awal-$nominal;
        if ($request->jenis == 'Pemasukan') {
            $bank_data = [
                'saldo' => $debit,
            ];
        } else {
            $bank_data = [
                'saldo' => $kredit,
            ];
        }
        
        $bank->update($bank_data);
        return back()->with('success', 'Data Transaksi Berhasil Dibuat');
    }

    public function transaksi_update(Request $request, $id)
    {
        // dd($request->all());
        $transaksi = Transaksi::Find($id);
        if ($request->has('file')) {
            $file = $request->file;
            $new_file = 'file' . time() . $file->getClientOriginalName();
            $file->move('file/transaksi/', $new_file);
            $data = [
                'kategori_id' => $request->kategori_id,
                'bank_id' => $request->bank_id,
                'tgl' => $request->tgl,
                'jenis' => $request->jenis,
                'keterangan' => $request->keterangan,
                'nominal' => $request->nominal,
                'periode_id' => $request->periode_id,
                'file' => 'file/transaksi/' . $new_file,
            ];
        } else {
            $data = [
                'kategori_id' => $request->kategori_id,
                'bank_id' => $request->bank_id,
                'tgl' => $request->tgl,
                'jenis' => $request->jenis,
                'keterangan' => $request->keterangan,
                'nominal' => $request->nominal,
                'periode_id' => $request->periode_id,
            ];
        }
        $transaksi->update($data);
        return back()->with('success', 'Data Transaksi Berhasil Diubah');
    }

    public function transaksi_delete($id)
    {
        $transaksi = Transaksi::Find($id);
        $transaksi->delete();
        return back()->with('success', 'Data Transaksi Berhasil Dihapus');
    }
}
