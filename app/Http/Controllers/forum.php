<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\User;
class forum extends Controller
{
    //

    public function home(){



    	$question = question::latest()->get();

    	return view('feed', compact('question'));
    }

    public function question(Request $req){


    	$info = question::where('id', $req['id'])->get();

    	return view('showQ', compact('info'));

    }
}
