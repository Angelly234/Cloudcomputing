<?php

namespace App\Http\Controllers\Scholar;

use Hash;
use session;

use Brian2694\Toastr\Facades\Toastr;
use App\Models\Scholar;
use Illuminate\Http\Request;
use App\Models\ScholarProfile;
use App\Models\UploadPaper;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ScholarController extends Controller
{
    function create(Request $request){
        //Validate inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:scholars,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);

        $scholar = new Scholar();
        $scholar->name = $request->name;
        $scholar->email = $request->email;
        $scholar->password = \Hash::make($request->password);
        $save = $scholar->save();

        if( $save ){
            return response()->json(['message' => 'You are now registered successfully as Scholar'], 200);
        }else{
            return response()->json(['message' => 'Something went wrong, failed to register'], 500);
        }
    }

    function check(Request $request){
        //Validate Inputs
        $request->validate([
            'email'=>'required|email|exists:scholars,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in scholars table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('scholar')->attempt($creds) ){
            return response()->json(['message' => 'Login successful'], 200);
        }else{
            return response()->json(['message' => 'Incorrect Credentials'], 401);
        }
    }

    function logout(){
        Auth::guard('scholar')->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function createProfile(){
        return response()->json(['message' => 'Create Profile page'], 200);
    }

    public function showProfile($userId){
        $data = ScholarProfile::with('papers')->where('scholars_id', $userId)->first();
        return response()->json(['profile' => $data], 200);
    }

    public function editProfile(Request $request){
        // Get from form
        $r_id = $request->id;
        $db_profile = DB::select('select * from scholars_profile where scholars_profile_id = ?', [$r_id]);
        return response()->json(['profile' => $db_profile], 200);
    }

    public function saveProfile(Request $request)
    {
        $data = new ScholarProfile(); // call model 
        $userId = Auth::id();

        $data->scholars_id =$userId;
        $data->first_name = $request->lname;
        $data->last_name = $request->fname;
        $data->bio = $request->bio;
        $data->work = $request->work;
        $data->experience = $request->experience;
        $data->education = $request->education;
        $data->email = $request->email;

        // Saving
        $data->save();

        return response()->json(['message' => 'Data Has Been inserted'], 200);
    }

    public function saveEditProfile(Request $request)
    {
        $r_id = $request->scholars_profile_id;
        $data = ScholarProfile::find($r_id);
        $userId = Auth::id();

        $data->scholars_id =$userId;
        $data->first_name = $request->lname;
        $data->last_name = $request->fname;
        $data->bio = $request->bio;
        $data->work = $request->work;
        $data->experience = $request->experience;
        $data->education = $request->education;
        $data->email = $request->email;

        // Saving
        $data->save();

        return response()->json(['message' => 'Data Has Been Updated'], 200);
    }

    public function uploadPaper(){
        return response()->json(['message' => 'Upload Paper page'], 200);
    }

    public function storePaper(Request $request){
        $request->validate([
            'title'   => 'required|string|max:255',
            'description'    => 'required|max:300',
            'website' => 'required|max:255',
            'publish_date' => 'required|date_format:Y-m-d'
        ]);

        $data = $request->input();
        $file = $request->file('file');
        $file->move(public_path('assets/files'), $file->getClientOriginalName());
        $userId = Auth::id();

        $save = DB::table('upload_papers')->insert([
            'scholars_id' => $userId,
            'title' => $data['title'],
            'description' => $data['description'],
            'website' => $data['website'],
            'publish_date' => $data['publish_date'],
            'file' => $file->getClientOriginalName(),
        ]);

        if (!$save) {
            return response()->json(['message' => 'Something went wrong, try again later.'], 500);
        }
        return response()->json(['message' => 'Data has been saved successfully.'], 200);
    }

    public function showPaper(Request $request, $userId){
        $data = UploadPaper::where('scholars_id', $userId)->get();
        return response()->json(['papers' => $data], 200);
    }
}
