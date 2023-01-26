<?php

namespace App\Models\Admin;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin\Produk;
use App\Models\Admin\SubKategori;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    public function sub_kategori()
    {
        return $this->hasMany(SubKategori::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    use HasFactory;

    public static function boot(){
        parent::boot();
        self::deleting(function($var){
            if ($var->sub_kategori->count() > 0){
                Alert::error('Error', 'Data Tidak Bisa Dihapus');
            return false;
            }
        });
    }
}
