<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Periode;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function kas()
    {
        $master = Periode::all();
        $kategori = Kas::all();
        return view('admin.kas', compact('kategori','master'));
    }

    public function kas_store(Request $request)
    {
        // dd($request->all()); 
        Kas::create([
            'bulan' => $request->bulan,
        ]);
        return back()->with('success', 'Kas Berhasil Dibuat');
    }

    public function kas_update(Request $request, $id)
    {
        // dd($request->all());
        $kategori = Kas::Find($id);
        $data = [
            'bulan' => $request->bulan,
        ];
        $kategori->update($data);
        return back()->with('success', 'Kas Berhasil Diubah');
    }

    public function kas_delete($id)
    {
        $kategori = Kas::Find($id);
        $kategori->delete();
        return back()->with('success', 'Kas Berhasil Dihapus');
    }
}
