<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class axios extends Controller
{
    //


    public function update(Request $req){

    	User::where('id', $req['id'])->increment('karma',10);


    }
    public function update2(Request $req){

    	User::where('id', $req['id'])->decrement('karma',2);


    }
}
