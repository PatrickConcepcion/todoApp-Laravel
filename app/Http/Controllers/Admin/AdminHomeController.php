<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminHomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = User::count();
        return view('admin.home')->with(compact(['user']));
    }
}
