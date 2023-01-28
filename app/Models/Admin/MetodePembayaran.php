<?php

namespace App\Models\Admin;

use App\Models\Admin\TopUp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetodePembayaran extends Model
{
    use HasFactory;

    public function topup(){
        return $this->hasMany(TopUp::class);
    }
    // public function topups(){
    //     return $this->belongsTo(TopUp::class);
    // }
}
