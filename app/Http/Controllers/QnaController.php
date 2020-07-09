<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Qna;

class QnaController extends Controller
{
    public function index()
    {
    	$qnas = Qna::latest()->take(10)->get();
    	return view('qna',compact('qnas'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'email' => 'required|email',
            'qna' => 'required'
        ]);

    	$qna=new Qna;
    	$qna->name=$request->name;
    	$qna->email=$request->email;
    	$qna->qna=$request->qna;
    	$qna->save();
    	Toastr::success('Q&A Successfully added :)','Success');
        return redirect()->back();
    }

    public function destroy($id)
    {
    	$qna=Qna::findOrFail($id);
    	$qna->delete();
    	Toastr::success('qna deleted successfully','Success');
    	return redirect()->back();
    }
}
