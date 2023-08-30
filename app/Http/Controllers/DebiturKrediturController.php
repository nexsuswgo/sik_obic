<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\DebiturKreditur;
use App\Models\Kategori;
use App\Models\Periode;
use Illuminate\Http\Request;

class DebiturKrediturController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function debit()
    {
        $debit = DebiturKreditur::all();
        return view('admin.debit', compact('debit'));
    }

    public function debit_store(Request $request)
    {
        // dd($request->all());
        DebiturKreditur::create([
            'name' => $request->name,
            'jenis' => $request->jenis,
            'toko' => $request->toko,
        ]);
        return back()->with('success', 'Data Berhasil Dibuat');
    }

    public function debit_update(Request $request, $id)
    {
        // dd($request->all());
        $debit = DebiturKreditur::Find($id);
        $data = [
            'name' => $request->name,
            'jenis' => $request->jenis,
            'toko' => $request->toko,
        ];
        $debit->update($data);
        return back()->with('success', 'Data Berhasil Diubah');
    }

    public function debit_delete($id)
    {
        $debit = DebiturKreditur::Find($id);
        $debit->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
