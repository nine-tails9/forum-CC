<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\answer;
use App\pendingAns;

use App\message;
class AnswerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $req){

        $req->validate([

            'Abody' => 'required',

        ]);

    	$ans = new answer;

    	$ans['body'] = $req['Abody'];

    	$ans['question_id'] = $req['id'];

    	$ans['user_id'] = auth()->user()->id;
    	$ans->save();

    	$nans = new pendingAns;

    	$nans['from'] = auth()->user()->id;
    	$nans['user_id'] = $req['user'];
        $nans['ans_id'] = $ans['id'];

    	$nans->save();

        $message = new message;

        $message['message'] = "New Answer from ". auth()->user()->name;
        $message['user_id'] = $req['user'];
        $message->save(); 
    	return back()->with('message', 'Answer Sent for Approval');

    }
}
