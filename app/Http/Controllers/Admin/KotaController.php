<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Kota;
use Illuminate\Http\Request;
use App\Models\Admin\Provinsi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KotaController extends Controller
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
        $provinsi = Provinsi::all();
        $kota = Kota::with('provinsi')->latest()->get();
        return view('admin.kota.index',['active' => 'kota'], compact('provinsi','kota'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.kota.create',['active' => 'kota'], compact('provinsi'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'provinsi_id' => 'required',
            'kota' => 'required|string|max:255|unique:kotas',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $kota = new Kota();
        $kota->provinsi_id = $request->provinsi_id;
        $kota->kota = $request->kota;
        $kota->save();
        return redirect()
        ->route('kota.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function show(Kota $kota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function edit(Kota $kota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kota $kota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Kota  $kota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kota $kota)
    {
        //
    }

    public function getKota($id)
    {
        $kotas = Kota::where('provinsi_id', $id)->get();
        return response()->json($kotas);
    }
}
