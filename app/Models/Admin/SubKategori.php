<?php

namespace App\Models\Admin;

use App\Models\Admin\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKategori extends Model
{
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    use HasFactory;
}
