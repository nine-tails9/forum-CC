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

        $info = User::where('admin', '!=', 1)->get();
        return view('adminPanel', compact('info'));
    }


    public function make(Request $req){

        User::where('id', $req['id'])->update(['admin' => 1]);
        return back()->with('message', 'User MAde Admin');
    }

    public function suspend(Request $req){

        User::where('id', $req['id'])->update(['admin' => 2]);
        return back()->with('message', 'User Suspended');
    }

    public function active(Request $req){

        User::where('id', $req['id'])->update(['admin' => 0]);
        return back()->with('message', 'User ACtive');
    }


    public function bonus(Request $req){

        User::where('id', $req['id'])->increment('karma', $req['bonus']);
        return back()->with('message', 'Karma Given');
    }

}
