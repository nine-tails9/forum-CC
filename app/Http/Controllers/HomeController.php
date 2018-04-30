<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function admin(){

        $info = User::where('admin', 0)->get();
        return view('adminPanel', compact('info'));
    }


    public function make(Request $req){

        User::where('id', $req['id'])->update(['admin' => 1]);
        return back();
    }

}
