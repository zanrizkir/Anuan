<?php

namespace App\Models\Admin;

use App\Models\Admin\Produk;
use App\Models\Admin\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKategori extends Model
{
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    use HasFactory;
}
