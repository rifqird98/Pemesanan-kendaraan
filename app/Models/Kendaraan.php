<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function jenis()
    {
    return $this->belongsTo(JenisKendaraan::class,'id_jenis','id');
    }
}
