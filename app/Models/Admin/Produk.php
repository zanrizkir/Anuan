<?php

namespace App\Models\Admin;

use App\Models\Admin\Image;
use App\Models\Admin\Kategori;
use App\Models\Admin\Keranjang;
use App\Models\Admin\SubKategori;
use App\Models\Admin\RiwayatProduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function subKategori()
    {
        return $this->belongsTo(SubKategori::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function riwayatProduk()
    {
        return $this->hasMany(RiwayatProduk::class);
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }

}
