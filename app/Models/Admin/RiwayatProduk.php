<?php

namespace App\Models\Admin;

use App\Models\Admin\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatProduk extends Model
{
    use HasFactory;
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
