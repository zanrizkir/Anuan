<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Tag;
use App\Models\Admin\Image;
use Illuminate\Support\Str;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\Kategori;
use App\Models\Admin\ProdukTag;
use App\Models\Admin\SubKategori;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $produk = Produk::with('kategori','tag')->latest()->get();
        // return view('admin.produk.index',['active' => 'produk'], compact('produk'));

        return view('admin.produk.index',['active' => 'produk'])->with([
            'produk' => Produk::with(['kategori','tags'])->latest()->paginate(8),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        // $tag = Tag::all();
        // return view('admin.produk.create',['active' => 'produk'], compact('kategoris','tag'));

        return view('admin.produk.create',compact('kategoris'),['active' => 'produk'])->with([
            'tags' => Tag::all(),
        ]);

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
            'tags   ' => 'required',
            'nama_produk' => 'required',
            'hpp' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = new Produk();
        $produk->kategori_id = $request->kategori_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->hpp = $request->hpp;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->deskripsi = $request->deskripsi;
        $produk->slug = Str::slug($request->nama_produk);
        $produk->save();

        // dd($request->tag_id);
        // foreach ($produk as $pro){
        //     ProdukTag::create([
        //         'produk_id' => $produk->id,
        //         'tag_id' => $request->tag_id
        //     ]);
        // }

        if($request->has('tags'))
        {
            $produk->tags()->attach($request->tags);
        }

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
            ->route('produk.index')->with('toast_success', 'Data Berhasil Ditambahkan');

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
        $kategoris = Kategori::all();
        $tag = Tag::all();
        // $subKategoris = SubKategori::where('kategori_id', $produk->kategori_id)->get();
        $images = Image::where('produk_id', $id)->get();
        return view('admin.produk.show',['active' => 'produk'], compact('kategoris', 'produk', 'tag', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        $tag = Tag::all();
        // $subKategoris = SubKategori::where('kategori_id', $produk->kategori_id)->get();
        $images = Image::where('produk_id', $id)->get();
        return view('admin.produk.edit',['active' => 'produk'], compact('kategoris', 'produk', 'subKategoris', 'images'));

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
            'tag_id' => 'required',
            'nama_produk' => 'required',
            'hpp' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->kategori_id = $produk->kategori_id;
        $produk->tag_id = $request->tag_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->hpp = $request->hpp;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->deskripsi = $request->deskripsi;
        $produk->save();
        return redirect()
            ->route('produk.index')->with('toast_success', 'Data Berhasil Diubah');
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
            ->route('produk.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
