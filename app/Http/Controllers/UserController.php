<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\DebiturKreditur;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function user()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
    }

    public function user_store(Request $request)
    {
        // dd($request->all());
        $messages = [
            'email' => 'Email Sudah Terdaftar'
        ];
        $this->validate($request, [
            'email' => 'unique:users,email'
        ], $messages);
        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'pass_view' => $request->password,
        ]);
        return back()->with('success', 'Data Pengguna Berhasil Dibuat');
    }

    public function user_update(Request $request, $id)
    {
        // dd($request->all());
        $user = User::Find($id);
        $data = [
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'pass_view' => $request->password,
        ];
        $user->update($data);
        return back()->with('success', 'Data Pengguna Berhasil Diubah');
    }

    public function user_delete($id)
    {
        $user = User::Find($id);
        $user->delete();
        return back()->with('success', 'Data Pengguna Berhasil Dihapus');
    }
}
