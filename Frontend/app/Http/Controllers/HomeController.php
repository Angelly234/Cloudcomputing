<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use App\Models\UploadPaper;
use Illuminate\Http\Request;
use App\Models\ScholarProfile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
    //  * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function search(){

        // $db_paper = DB::select('select * from upload_papers');
        // $db_scholar = DB::select('select * from scholars');

        $search_text = $_GET['query'];
        $v_paper = UploadPaper::where('title', 'LIKE', '%'.$search_text.'%')->with('user')->get();

        // return response()->json($v_paper);

        return view('search', compact('v_paper'));
    }

    public function showPapers(Request $request){
        $v_paper = UploadPaper::all();
        return view('search', compact('v_paper'));
    }

    // public function showProfile($userId){
 
    //     $data = ScholarProfile::with('papers')->where('scholars_id', $userId)->first();

    //     return view('dashboard.scholar.view-profile', [
    //         'v_profile' => $data,
    //     ]);
    // }
}
