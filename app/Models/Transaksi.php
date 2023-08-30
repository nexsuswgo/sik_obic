<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'obic_transaksi';
    protected $guarded = ['id'];
    protected $dates = ['tgl'];

    public function kategori_()
    {
        return $this->belongsTo(Kas::class, 'kategori_id');
    }

    public function bank_()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    public function periode_()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
}
