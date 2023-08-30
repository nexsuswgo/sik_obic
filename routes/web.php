<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\DebiturKrediturController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HutangPiutangController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::controller(HomeController::class)->group(function () {
        // Home
        Route::get('/', 'home')->name('home');

    });

    // Route::controller(KasController::class)->group(function () {
    //     Route::get('kas', 'kas')->name('kas');
    //     Route::post('kas_s', 'kas_store')->name('kas.s');
    //     Route::put('kas_u/{kas_u}', 'kas_update')->name('kas.u');
    //     Route::delete('kas_d/{kas_d}', 'kas_delete')->name('kas.d');
    // });

    Route::controller(BankController::class)->group(function () {
        Route::get('bank', 'bank')->name('bank');
        Route::post('bank_s', 'bank_store')->name('bank.s');
        Route::put('bank_u/{bank_u}', 'bank_update')->name('bank.u');
        Route::delete('bank_d/{bank_d}', 'bank_delete')->name('bank.d');
        Route::post('sinkron/{id}', 'sinkron')->name('sinkron');
    });


    Route::controller(PeriodeController::class)->group(function () {
        Route::get('periode', 'periode')->name('periode');
        Route::post('periode_s', 'periode_store')->name('periode.s');
        Route::put('periode_u/{periode_u}', 'periode_update')->name('periode.u');
        Route::put('periode_d/{periode_d}', 'periode_delete')->name('periode.d');
        Route::put('periode_sak/{periode_sak}', 'periode_sakelar')->name('periode.sak');
    });

    Route::controller(TransaksiController::class)->group(function () {
        Route::get('transaksi', 'transaksi')->name('transaksi');
        Route::post('transaksi_s', 'transaksi_store')->name('transaksi.s');
        Route::put('transaksi_u/{transaksi_u}', 'transaksi_update')->name('transaksi.u');
        Route::delete('transaksi_d/{transaksi_d}', 'transaksi_delete')->name('transaksi.d');
    });

    Route::controller(LaporanController::class)->group(function () {
        Route::get('laporan', 'laporan')->name('laporan');
        Route::get('laporan_transaksi/{laporan_transaksi}', 'laporan_transaksi')->name('laporan.t');
        Route::get('laporan_hutang/{laporan_hutang}', 'laporan_hutang')->name('laporan.h');
        Route::get('laporan_piutang/{laporan_piutang}', 'laporan_piutang')->name('laporan.p');
        Route::get('laporan_rekening/{laporan_rekening}', 'laporan_rekening')->name('laporan.r');
        Route::get('cetak_laporan_transaksi/{cetak_laporan_transaksi}', 'cetak_laporan_transaksi')->name('cetak.l.t');
        Route::get('cetak_laporan_hutang/{cetak_laporan_hutang}', 'cetak_laporan_hutang')->name('cetak.l.h');
        Route::get('cetak_laporan_piutang/{cetak_laporan_piutang}', 'cetak_laporan_piutang')->name('cetak.l.p');
        Route::get('cetak_laporan_rekening/{cetak_laporan_rekening}', 'cetak_laporan_rekening')->name('cetak.l.r');
    });

    Route::controller(DebiturKrediturController::class)->group(function () {
        Route::get('debit', 'debit')->name('debit');
        Route::post('debit_s', 'debit_store')->name('debit.s');
        Route::put('debit_u/{debit_u}', 'debit_update')->name('debit.u');
        Route::delete('debit_d/{debit_d}', 'debit_delete')->name('debit.d');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'user')->name('user');
        Route::post('user_s', 'user_store')->name('user.s');
        Route::put('user_u/{user_u}', 'user_update')->name('user.u');
        Route::delete('user_d/{user_d}', 'user_delete')->name('user.d');
    });

    Route::controller(HutangPiutangController::class)->group(function () {
        Route::get('hutang', 'hutang')->name('hutang');
        Route::post('hutang_s', 'hutang_store')->name('hutang.s');
        Route::put('hutang_u/{hutang_u}', 'hutang_update')->name('hutang.u');
        Route::delete('hutang_d/{hutang_d}', 'hutang_delete')->name('hutang.d');
        Route::get('piutang', 'piutang')->name('piutang');
    });
});
