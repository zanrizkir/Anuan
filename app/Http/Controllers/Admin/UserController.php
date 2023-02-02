<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        
        $users = User::where('role', 'costumer')->get();
        
        return view('admin.user.index',['active' => 'user'], compact('users'));
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()
            ->route('user.index')->with('toast_success', 'Data Berhasil Dihapus');
    }
}
