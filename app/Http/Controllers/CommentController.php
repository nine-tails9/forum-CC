<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $req){

        $req->validate([

            'body' => 'required',

        ]);

    	$data = new comment;

    	$data['answer_id'] = $req['id'];

    	$data['body'] = $req['Cbody'];

    	$data['user_id'] = auth()->user()->id;

    	$data->save();

    	return back();
    }
}
