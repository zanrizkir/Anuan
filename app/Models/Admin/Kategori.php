<?php

namespace App\Models\Admin;

use App\Models\Admin\SubKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    public function sub_kategori()
    {
        return $this->hasMany(SubKategori::class);
    }
    use HasFactory;
}
