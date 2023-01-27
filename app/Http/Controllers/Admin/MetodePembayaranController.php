<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Admin\MetodePembayaran;

class MetodePembayaranController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metode = MetodePembayaran::all();
        // $kategori = Kategori::all();
        $active = 'metode';
        return view('admin.metodepembayaran.index', compact('metode','active'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.metodepembayaran.create',['active' => 'metode']);
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
            'metode' => 'required|unique:metode_pembayarans',
        ]);

        $metode = new MetodePembayaran();
        $metode->metode = $request->metode;
        $metode->save();
        return redirect()->route('metode.index')->with('toast_success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function show(MetodePembayaran $metodePembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metode = MetodePembayaran::findOrFail($id);
        return view('admin.metodepembayaran.edit',['active' => 'metode'], compact('metode'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $metode = MetodePembayaran::findOrFail($id);

        if ($request->metode != $metode->metode){
            $rules['metode'] = 'required';
        }

        $validasiData = $request->validate($rules);

        $metode->metode = $request->metode;
        $metode->save();
        return redirect()
            ->route('metode.index')->with('toast_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\MetodePembayaran  $metodePembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $metode = MetodePembayaran::findOrFail($id);
        $metode->delete();
        return redirect()
            ->route('metode.index')->with('toast_success', 'Data Berhasil Dihapus');

    }
}
