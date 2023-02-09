<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukTag extends Model
{
    use HasFactory;

    protected $fillable = ['produk_id', 'tag_id'];
}
