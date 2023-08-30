<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Kategori;
use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function periode()
    {
        $periode = Periode::where('status', '<>', 'Terhapus')
            ->orderBy('status', 'DESC')
            ->get();
        return view('admin.periode', compact('periode'));
    }

    public function periode_store(Request $request)
    {
        // dd($request->all());
        $messages = [
            'periode' => 'Periode Sudah Terdaftar',
            'status' => 'Ada Periode Yang Masih Aktif'
        ];
        $this->validate($request, [
            'periode' => 'unique:obic_periode,periode',
            'status' => 'unique:obic_periode,status'
        ], $messages);
        Periode::create([
            'status' => $request->status,
            'periode' => $request->periode,
        ]);
        return back()->with('success', 'Data Periode Berhasil Dibuat');
    }

    public function periode_update(Request $request, $id)
    {
        // dd($request->all());
        $periode = Periode::Find($id);
        $data = [
            'status' => $request->status,
            'periode' => $request->periode,
        ];
        $periode->update($data);
        return back()->with('success', 'Data Periode Berhasil Diubah');
    }

    public function periode_sakelar(Request $request, $id)
    {
        // dd($request->all());
        $messages = [
            'status' => 'Ada Periode Yang Masih Aktif'
        ];
        $this->validate($request, [
            'status' => 'unique:obic_periode,status'
        ], $messages);
        $periode = Periode::Find($id);
        $data = [
            'status' => $request->status,
            'periode' => $request->periode,
        ];
        $periode->update($data);

        return back()->with('success', 'Data Status Periode Berhasil Diubah');
    }

    public function periode_delete(Request $request, $id)
    {
        // dd($request->all());
        $periode = Periode::Find($id);
        $data = [
            'status' => $request->status,
            'periode' => $request->periode,
        ];
        $periode->update($data);
        return back()->with('success', 'Data Periode Berhasil Dihapus');
    }
}
