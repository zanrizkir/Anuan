<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\Keranjang;
use App\Http\Controllers\Controller;

class KeranjangController extends Controller
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
        $keranjangs = Keranjang::where('status', 'keranjang')->with('produk', 'user')->latest()->get();
        $total_keranjangs = Keranjang::where('status', 'keranjang')->count();
        $users = User::where('role', 'costumer')->get();
        $produks = Produk::all();
        return view('admin.keranjang.index',['active' => 'keranjangs'], compact('keranjangs', 'total_keranjangs', 'users','produks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produks = Produk::all();
        $users = User::where('role', 'costumer')->get();
        return view('admin.keranjang.create',['active' => 'keranjangs'], compact('produks', 'users'));
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
            'user_id' => 'required',
            'produk_id' => 'required',
            'ukuran' => 'required',
            'jumlah' => 'required',
        ]);

        $keranjangs = new Keranjang();
        $keranjangs->user_id = $request->user_id;
        $keranjangs->produk_id = $request->produk_id;
        $keranjangs->jumlah = $request->jumlah;
        $diskon = (($keranjangs->produk->diskon / 100) * $keranjangs->produk->harga);
        $keranjangs->total_harga = ($keranjangs->produk->harga * $request->jumlah) - $diskon;
        $keranjangs->save();
        return redirect()
            ->route('keranjang.index')->with('toast_success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Keranjang  $keranjang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
