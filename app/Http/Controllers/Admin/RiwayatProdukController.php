<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Produk;
use Illuminate\Http\Request;
use App\Models\Admin\RiwayatProduk;
use App\Http\Controllers\Controller;

class RiwayatProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = RiwayatProduk::with('produk')->latest()->get();
        return view('admin.riwayatproduk.index',['active' => 'riwayat'], compact('riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produks = Produk::all();
        return view('admin.produk.index',['active' => 'produk'], compact('produk'));
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
            'produk_id' => 'required',
            'type' => 'required',
            'qty' => 'required',
            'note' => 'required',
        ]);

        $riwayat = new RiwayatProduk();
        $riwayat->produk_id = $request->produk_id;
        $riwayat->type = $request->type;
        $riwayat->qty = $request->qty;
        $riwayat->note = $request->note;
        $riwayat->save();

        $produks = Produk::findOrFail($riwayat->produk_id);
        if ($riwayat->type == 'masuk') {
            $produks->stok += $riwayat->qty;
        } elseif ($riwayat->type == 'keluar') {
            if ($produks->stok < $riwayat->qty) {
                return redirect()
                    ->route('produk.index')->with('error', 'Stok Kurang');
            } else {
                $produks->stok -= $riwayat->qty;
            }
        }

        $produks->save();
        return redirect()
            ->route('produk.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\RiwayatProduk  $riwayatProduk
     * @return \Illuminate\Http\Response
     */
    public function show(RiwayatProduk $riwayatProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\RiwayatProduk  $riwayatProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(RiwayatProduk $riwayatProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\RiwayatProduk  $riwayatProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RiwayatProduk $riwayatProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\RiwayatProduk  $riwayatProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = RiwayatProduk::findOrFail($id);
        $riwayat->delete();
        return redirect()
            ->route('riwayatProduk.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
