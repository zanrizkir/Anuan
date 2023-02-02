<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Kota;
use App\Models\Admin\Provinsi;
use App\Models\Admin\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alamat extends Model
{
    use HasFactory;

    public function provinsi(){
        return $this->belongsTo(Provinsi::class);
    }
    public function kota(){
        return $this->belongsTo(Kota::class);
    }
    
    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
