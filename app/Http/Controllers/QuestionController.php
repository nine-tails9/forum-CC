<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
class QuestionController extends Controller
{
    //


     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    	return view('QuesCreate');
    }

    public function save(Request $req){

    	$ques = new question;

    	$ques['body'] = $req['Qbody'];

        $ques['title'] = $req['Qtitle'];

    	$ques['user_id'] = auth()->user()->id;

    	$ques->save();

    	return redirect('/forum');

    }

    public function  myQues(){

        $data = question::where('user_id', auth()->user()->id)->get();

        return view('MyQues',compact('data'));
    }
}
