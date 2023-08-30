<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function bank()
    {
        $bank = Bank::all();
        return view('admin.bank', compact('bank'));
    }

    public function bank_store(Request $request)
    {
        // dd($request->all());
        Bank::create([
            'bank' => $request->bank,
            'pemilik' => $request->pemilik,
            'no_rekening' => $request->no_rekening,
            'saldo' => $request->saldo,
        ]);
        return back()->with('success', 'Data Bank Berhasil Dibuat');
    }

    public function bank_update(Request $request, $id)
    {
        // dd($request->all());
        $bank = Bank::Find($id);
        $data = [
            'bank' => $request->bank,
            'pemilik' => $request->pemilik,
            'no_rekening' => $request->no_rekening,
            'saldo' => $request->saldo,
        ];
        $bank->update($data);
        return back()->with('success', 'Data Bank Berhasil Diubah');
    }

    public function bank_delete($id)
    {
        $bank = Bank::Find($id);
        $bank->delete();
        return back()->with('success', 'Data Bank Berhasil Dihapus');
    }
}
