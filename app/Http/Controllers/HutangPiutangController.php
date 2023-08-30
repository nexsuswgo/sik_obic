<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\HutangPiutang;
use App\Models\Kategori;
use App\Models\Periode;
use Illuminate\Http\Request;

class HutangPiutangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function hutang()
    {
        $master = Periode::where('status', 'Aktif')->first();
        $periode = $master->periode;
        $periode_id = $master->id;
        $hutang = HutangPiutang::where('jenis', 'Hutang')->get();
        $id = HutangPiutang::all()->max('id');
        $kode = $id + 1;
        return view('admin.hutang', compact('hutang', 'kode', 'periode_id', 'periode'));
    }

    public function piutang()
    {
        $master = Periode::where('status', 'Aktif')->first();
        $periode = $master->periode;
        $periode_id = $master->id;
        $piutang = HutangPiutang::where('jenis', 'Piutang')->get();
        $id = HutangPiutang::all()->max('id');
        $kode = $id + 1;
        return view('admin.piutang', compact('piutang', 'kode', 'periode_id', 'periode'));
    }

    public function hutang_store(Request $request)
    {
        // dd($request->all());
        HutangPiutang::create([
            'kode' => $request->kode,
            'tgl' => $request->tgl,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'jenis' => $request->jenis,
            'periode_id' => $request->periode_id,
        ]);
        return back()->with('success', 'Data Berhasil Dibuat');
    }

    public function hutang_update(Request $request, $id)
    {
        // dd($request->all());
        $hutang = HutangPiutang::Find($id);
        $data = [
            'kode' => $request->kode,
            'tgl' => $request->tgl,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'jenis' => $request->jenis,
            'periode_id' => $request->periode_id,
        ];
        $hutang->update($data);
        return back()->with('success', 'Data Berhasil Diubah');
    }

    public function hutang_delete($id)
    {
        $hutang = HutangPiutang::Find($id);
        $hutang->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
