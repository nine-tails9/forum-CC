<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;
use App\tags;
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

        for($i = 0; $i < sizeof($req['tags']); $i++){

            $tags = new tags;
            $tags['question_id'] = $ques['id'];
            $tags['Tag_name'] = $req['tags'][$i];

            $tags->save();

        }

    	return redirect('/forum');

    }

    public function  myQues(){

        $data = question::where('user_id', auth()->user()->id)->latest()->get();

        return view('MyQues',compact('data'));
    }
}
