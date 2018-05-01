<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\message;
class MessageController extends Controller
{
    //

    public function fetch(){

    	$data = message::where('user_id', auth()->user()->id)->limit(10)->get();
    	return response()->json([$data]);

    }
}
