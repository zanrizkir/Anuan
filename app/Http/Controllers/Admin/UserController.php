<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        
        $users = User::where('role', 'costumer')->get();
        
        return view('admin.user.index',['active' => 'user'], compact('users'));
    }
}
