<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Voted;
use App\question;

use App\message;
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

        $message = new message;
        $message['message'] = "New Upvote from ". auth()->user()->name;
        $message['user_id'] = $req['id'];
        $message->save(); 
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

        $message = new message;
        $message['message'] = "New Downvote from ". auth()->user()->name;
        $message['user_id'] = $req['id'];
        $message->save(); 
    	User::where('id', $req['id'])->decrement('karma',2);


    }
    public function upvote(Request $req){

    	$cnt = Voted::where([
    		['question_id', $req['id']],
    		['user_id', auth()->user()->id]
    		])->count();


    	if($cnt){

            question::where('id',$req['id'])->increment('upvotes',1);

            question::where('id',$req['id'])->decrement('downvotes',1);
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

            question::where('id',$req['id'])->increment('upvotes',1);
    	}


    }

    public function downvote(Request $req){

    	$cnt = Voted::where([
    		['question_id', $req['id']],
    		['user_id', auth()->user()->id]
    		])->count();

    	if($cnt){

            question::where('id',$req['id'])->increment('downvotes',1);

            question::where('id',$req['id'])->decrement('upvotes',1);

    		Voted::where([
    		['question_id', $req['id']],
    		['user_id', auth()->user()->id]
    		])->update(['downvoted' => 1, 'upvoted' => 0]);

    	}else{

    		$data = new Voted;

    		$data['question_id'] = $req['id'];

    		$data['user_id'] = auth()->user()->id;

    		$data['downvoted'] = 1;

            question::where('id',$req['id'])->increment('downvotes',1);

    		$data->save();
    	}


    }
    public function check(Request $req){

    	$data = Voted::where('user_id', $req['id'])->get();

    	return response()->json([$data]);

    	
    }
}
