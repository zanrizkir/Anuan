<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Provinsi;
use App\Models\Admin\Kecamatan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class KecamatanController extends Controller
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
        $kecamatan = Kecamatan::with('provinsi','kota')->get();
        return view('admin.kecamatan.index',['active' => 'kecamatan'],compact('kecamatan'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        return view('admin.kecamatan.create',['active' => 'kecamatan'],compact('provinsi'));

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
            'kota_id' => 'required',
            'kecamatan' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $kecamatan = New Kecamatan();
        $kecamatan->provinsi_id = $request->provinsi_id;
        $kecamatan->kota_id = $request->kota_id;
        $kecamatan->kecamatan = $request->kecamatan;
        $kecamatan->save();
        return redirect()
        ->route('kecamatan.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kecamatan $kecamatan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kecamatan $kecamatan)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'kecamatan' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->provinsi_id = $request->provinsi_id;
        $kecamatan->kota_id = $request->kota_id;
        $kecamatan->kecamatan = $request->kecamatan;
        $kecamatan->save();
        return redirect()
        ->route('kecamatan.index')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()
            ->route('kecamatan.index')->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function getKecamatan($id)
    {
        $kecamatan = Kecamatan::where('kota_id', $id)->get();
        return response()->json($kecamatan);
    }
}
