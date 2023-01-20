<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    
    protected $guarded=[];

    public function driver(){
        return $this->hasMany( Driver::class, 'id', 'id_driver');
    }

    public function atasan2(){
        return $this->hasMany( Atasan::class, 'id', 'persetujuan_2');
    }

    public function atasan(){
        return $this->hasMany( Atasan::class, 'id', 'persetujuan_1');
    }

    // public function atasan2(){
    //     return $this->hasMany( Atasan::class, 'id', 'persetujuan_2' );
    // }

    public function kendaraan(){
        return $this->hasMany( Kendaraan::class, 'id', 'id_kendaraan' );
    }
}
