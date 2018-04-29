<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Voted;
class axios extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update(Request $req){


    	$cnt = Voted::where([
    		['question_id', $req['id2']],
    		['user_id', auth()->user()->id]
    		])->count();

    	if($cnt){

	    	User::where('id', $req['id'])->increment('karma',2);


    	}

    	User::where('id', $req['id'])->increment('karma',10);


    }
    public function update2(Request $req){



    	$cnt = Voted::where([
    		['question_id', $req['id2']],
    		['user_id', auth()->user()->id]
    		])->count();

    	if($cnt){

	    	User::where('id', $req['id'])->decrement('karma',10);

    	}
    	User::where('id', $req['id'])->decrement('karma',2);


    }
    public function upvote(Request $req){

    	$cnt = Voted::where([
    		['question_id', $req['id']],
    		['user_id', auth()->user()->id]
    		])->count();

    	if($cnt){

    		Voted::where([
    		['question_id', $req['id']],
    		['user_id', auth()->user()->id]
    		])->update(['downvoted' => 0, 'upvoted' => 1]);

    	}else{

    		$data = new Voted;

    		$data['question_id'] = $req['id'];

    		$data['user_id'] = auth()->user()->id;

    		$data['upvoted'] = 1;

    		$data->save();
    	}


    }

    public function downvote(Request $req){

    	$cnt = Voted::where([
    		['question_id', $req['id']],
    		['user_id', auth()->user()->id]
    		])->count();

    	if($cnt){

    		Voted::where([
    		['question_id', $req['id']],
    		['user_id', auth()->user()->id]
    		])->update(['downvoted' => 1, 'upvoted' => 0]);

    	}else{

    		$data = new Voted;

    		$data['question_id'] = $req['id'];

    		$data['user_id'] = auth()->user()->id;

    		$data['downvoted'] = 1;

    		$data->save();
    	}


    }
    public function check(Request $req){

    	$data = Voted::where('user_id', $req['id'])->get();

    	return response()->json([$data]);

    	
    }
}
