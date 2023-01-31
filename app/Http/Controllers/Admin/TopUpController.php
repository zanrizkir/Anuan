<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\TopUp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\MetodePembayaran;

class TopUpController extends Controller
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
        $topup = TopUp::with('user', 'metode')->latest()->get();
        $users = User::where('role', 'costumer')->get();
        $metode = MetodePembayaran::all();
        return view('admin.topup.index',['active' => 'topup'], compact('topup','users','metode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 'costumer')->get();
        $metode = MetodePembayaran::all();
        return view('admin.topup.create', compact('users','metode'));
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
            'saldo' => 'required',
            'metode_pembayaran_id' => 'required',
        ]);

        $topup = new TopUp();
        $topup->user_id = $request->user_id;
        $topup->saldo = $request->saldo;
        $topup->metode_pembayaran_id = $request->metode_pembayaran_id;
        $topup->save();

        // dd($request->metode_pembayaran_id);

        $users = User::findOrFail($topup->user_id);
        $users->saldo += $topup->saldo;
        $users->save();
        return redirect()
            ->route('topup.index')
            ->with('toast_success', 'Data has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function show(TopUp $topUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function edit(TopUp $topUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopUp $topUp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopUp $topUp)
    {
        //
    }
}
