<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HutangPiutang extends Model
{
    use HasFactory;
    protected $table = 'obic_hutang_piutang';
    protected $guarded = ['id'];

    public function periode_()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
}
