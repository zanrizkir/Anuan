<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag'];

        public function products(){
        return $this->belongsToMany(Tag::class, 'product_tags');
    }
}
