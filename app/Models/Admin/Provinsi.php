<?php

namespace App\Models\Admin;

use App\Models\Admin\Kota;
use App\Models\Admin\Alamat;
use App\Models\Admin\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provinsi extends Model
{
    use HasFactory;
    
    public function kota(){
        return $this->hasMany(Kota::class);
    }
    
    public function kecamatan(){
        return $this->hasMany(Kecamatan::class);
    }
    
    public function alamat(){
        return $this->hasMany(Alamat::class);
    }
 
    public static function boot(){
        parent::boot();
        self::deleting(function($var){
            if ($var->kota->count() > 0){
                Alert::error('Error', 'Data Tidak Bisa Dihapus');
            return false;
            }
        });
    }
}
