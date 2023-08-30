<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebiturKreditur extends Model
{
    use HasFactory;
    protected $table = 'obic_debitur_kreditur';
    protected $guarded = ['id'];
}
