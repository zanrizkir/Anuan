<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Alamat;
use Illuminate\Http\Request;
use App\Models\Admin\Provinsi;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AlamatController extends Controller
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
        $alamat = ALamat::with('user','provinsi','kota','kecamatan')->get();
        $users = User::where('role','costumer')->get();
        $provinsi = Provinsi::all();
        return view('admin.alamat.index',['active' => 'alamat'],compact('alamat','users','provinsi'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinsi = Provinsi::all();
        $users = User::where('role','costumer')->get();
        return view('admin.alamat.create',['active' => 'alamat'],compact('provinsi','users'));

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
            'user_id' => 'required',
            'nama_lengkap' => 'required',
            // 'telpon' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'kecamatan_id' => 'required',
            'alamat' => 'required',
        ]);

        $alamat = New Alamat();
        $alamat->user_id = $request->user_id;
        $alamat->nama_lengkap = $request->nama_lengkap;
        $alamat->telpon = $request->telpon;
        $alamat->provinsi_id = $request->provinsi_id;
        $alamat->kota_id = $request->kota_id;
        $alamat->kecamatan_id = $request->kecamatan_id;
        $alamat->alamat = $request->alamat;
        $alamat->tag = $request->tag;
        $alamat->save();
        return redirect()->route('alamat.index')->with('toast_success', 'Data Berhasil Diubah');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function show(Alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function edit(Alamat $alamat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alamat $alamat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alamat $alamat)
    {
        //
    }
}
