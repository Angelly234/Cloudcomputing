<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadPaper;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function search(Request $request){
        $search_text = $request->query('query');
        $v_paper = UploadPaper::where('title', 'LIKE', '%'.$search_text.'%')->with('user')->get();
        return response()->json(['papers' => $v_paper], 200);
    }

    public function showPapers(){
        $v_paper = UploadPaper::all();
        return response()->json(['papers' => $v_paper], 200);
    }
}
