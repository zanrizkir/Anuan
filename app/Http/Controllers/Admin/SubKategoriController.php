<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Kategori;
use App\Models\Admin\SubKategori;
use App\Http\Controllers\Controller;

class SubKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $sub = SubKategori::with('kategori')->latest()->get();
        return view('admin.subKategori.index', compact('kategoris','sub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.subKategori.create', compact('kategoris'));
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
            'name' => 'required',
        ]);

        $sub = new subKategori();
        $sub->kategori_id = $request->kategori_id;
        $sub->name = $request->name;
        $sub->save();
        return redirect()
            ->route('subkategori.index')->with('success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function show(SubKategori $subKategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function update($id){
        $kategoris = Kategori::all();
        $subKategoris = subKategori::findOrFail($id);
        return view('admin.subkategori.edit', compact('kategoris', 'sub'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKategori  $subKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub = subKategori::findOrFail($id);
        $sub->delete();
        return redirect()
            ->route('subKategori.index')->with('success', 'Data has been deleted');
    }

    public function getSubKategori($id)
    {
        $sub_kategoris = SubKategori::where('kategori_id', $id)->get();
        return response()->json($sub_kategoris);
    }
}
