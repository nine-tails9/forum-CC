<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\answer;
class AnswerController extends Controller
{
    //

    public function create(Request $req){


    	$ans = new answer;

    	$ans['body'] = $req['Abody'];

    	$ans['question_id'] = $req['id'];

    	$ans['user_id'] = auth()->user()->id;
    	$ans->save();


    	return back();

    }
}
