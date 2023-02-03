<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Image;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\Kategori;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function homeuser(Request $request)
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        $kategori = Kategori::all();
        $images = Image::all();
        return view('user.frontend.home', compact('produk','kategori','images'));
    }
    public function produkuser(Request $request)
    {
        $produk = Produk::all();
        $images = Image::all();
        $kategoris = Kategori::all();
        return view('user.frontend.produk', compact('produk','kategoris','images'));
    }

    public function produkdetail($id)
    {
        // $pro = $request->all();
        $produk = Produk::findOrFail($id);
        $images = Image::all();
        // $images = Image::find(1);
        // $kategoris = Kategori::all();
        // if($pro){
        //     $produk = Produk::where('kategori_id', $pro)->get();
        // }
        return view('template.user.detailproduk', compact('produk', 'images'));
    }
}
