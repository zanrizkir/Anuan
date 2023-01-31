<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Provinsi;
use App\Http\Controllers\Controller;

class ProvinsiController extends Controller
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
        $provinsi = Provinsi::all();
        $active = 'provinsi';
        return view('admin.provinsi.index', compact('provinsi','active'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'provinsi' => 'required|unique:provinsis',
        ]);


        $provinsi = new Provinsi();
        $provinsi->provinsi = $request->provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with('toast_success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinsi $provinsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (!Provinsi::destroy($id)){
        //     return redirect()->back();
        // }

        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();
        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
