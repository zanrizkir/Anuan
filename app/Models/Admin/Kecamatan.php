<?php

namespace App\Models\Admin;

use App\Models\Admin\Kota;
use App\Models\Admin\Alamat;
use App\Models\Admin\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    public function kota(){
        return $this->belongsTo(Kota::class);
    }
    
    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
    
    public function alamat(){
        return $this->hasMany(Alamat::class);
    }
}
