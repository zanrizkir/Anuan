<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\MetodePembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TopUp extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function metode(){
        return $this->belongsTo(MetodePembayaran::class,'metode_pembayaran_id');
    }
}
