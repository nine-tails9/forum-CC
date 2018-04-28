<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
class CommentController extends Controller
{
    //

    public function create(Request $req){


    	$data = new comment;

    	$data['answer_id'] = $req['id'];

    	$data['body'] = $req['Cbody'];

    	$data['user_id'] = auth()->user()->id;

    	$data->save();

    	return back();
    }
}
