<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
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
        $kategori = Kategori::all();
        $active = 'kategori';
        return view('admin.kategori.index', compact('kategori','active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create',['active' => 'kategori']);
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
            'name' => 'required|unique:kategoris',
        ]);

        // if ($request->validate->fails()) {
        //     return back()->with('errors', $request->validate->messages()->all()[0])->withInput();
        // }

        $kategori = new Kategori();
        $kategori->name = $request->name;
        $kategori->save();
        return redirect()->route('kategori.index')->with('toast_success', 'Data Berhasil Ditambahkan');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit',['active' => 'kategori'], compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($request->name != $kategori->name){
            $rules['name'] = 'required';
        }

        $validasiData = $request->validate($rules);

        $kategori->name = $request->name;
        $kategori->save();
        return redirect()
            ->route('kategori.index')->with('toast_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()
            ->route('kategori.index')->with('toast_success', 'Data Berhasil Dihapus');

    }
}
