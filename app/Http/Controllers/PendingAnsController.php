<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pendingAns;
use App\User;
use App\answer;
class PendingAnsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){

    	$data = pendingAns::where('user_id', auth()->user()->id)->get();

    	$info = [];
    	foreach ($data as $key)
    	{
    		$tem = User::where('id', $key['from'])->value('name');
    		array_push($info,(object)array("id" => $key['ans_id'], "name" => $tem));
		}
    	return view('PendingAns', compact('info'));


    }

    public function approve(Request $req){

    	$id = answer::where('id', $req['id'])->value('user_id');
    	answer::where('id', $req['id'])->update(['status' => 1]);

    	pendingAns::where('ans_id', $req['id'])->delete();

    	User::where('id', $id)->increment('karma',5);
    	return redirect('pending');
    }
    public function discard(Request $req){

    	answer::where('id', $req['id'])->delete();

    	pendingAns::where('ans_id', $req['id'])->delete();

    	return redirect('pending');
    }
}
