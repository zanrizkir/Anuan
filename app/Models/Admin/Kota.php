<?php

namespace App\Models\Admin;

use App\Models\Admin\Alamat;
use App\Models\Admin\Provinsi;
use App\Models\Admin\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kota extends Model
{
    use HasFactory;

    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
    
    public function kecamatan(){
        return $this->hasMany(Kecamatan::class);
    }
    
    public function alamat(){
        return $this->hasMany(Alamat::class);
    }
}
