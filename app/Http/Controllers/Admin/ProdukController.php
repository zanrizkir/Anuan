<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Image;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\Kategori;
use App\Models\Admin\SubKategori;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::with('kategori', 'subKategori')->latest()->get();
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        // $sub = SubKategori::all();
        return view('admin.produk.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'sub_kategori_id' => 'required',
            'nama_produk' => 'required',
            'hpp' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = new Produk();
        $produk->kategori_id = $request->kategori_id;
        $produk->sub_kategori_id = $request->sub_kategori_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->hpp = $request->hpp;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();

        if ($request->hasfile('gambar_produk')) {
            foreach ($request->file('gambar_produk') as $image) {
                $name = rand(1000, 9999) . $image->getClientOriginalName();
                $image->move('images/gambar_produk/', $name);
                $images = new Image();
                $images->produk_id = $produk->id;
                $images->gambar_produk = 'images/gambar_produk/' . $name;
                $images->save();
            }
        }

        return redirect()
            ->route('produk.index')->with('success', 'Data has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoris = Kategori::all();
        $produk = Produk::findOrFail($id);
        $subKategoris = SubKategori::where('kategori_id', $produk->kategori_id)->get();
        $images = Image::where('produk_id', $id)->get();
        return view('admin.produk.edit', compact('kategoris', 'produk', 'subKategoris', 'images'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'sub_kategori_id' => 'required',
            'nama_produk' => 'required',
            'hpp' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->kategori_id = $produk->kategori_id;
        $produk->sub_kategori_id = $request->sub_kategori_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->hpp = $request->hpp;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();
        return redirect()
            ->route('produk.index')->with('success', 'Data has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produks = Produk::findOrFail($id);
        $images = Image::where('produk_id', $id)->get();
        foreach ($images as $image) {
            $image->deleteImage();
            $image->delete();
        }
        $produks->delete();
        return redirect()
            ->route('produk.index')->with('success', 'Data has been deleted');
    }
}
