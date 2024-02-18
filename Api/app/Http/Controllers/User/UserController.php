<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\UploadPaper;
use App\Models\User;

class UserController extends Controller
{
    function create(Request $request){
        //Validate Inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        if( $save ){
            return response()->json(['message' => 'You are now registered successfully'], 200);
        }else{
            return response()->json(['message' => 'Something went wrong, failed to register'], 500);
        }
    }

    function check(Request $request){
        //Validate inputs
        $request->validate([
           'email'=>'required|email|exists:users,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists on users table'
        ]);

        $creds = $request->only('email','password');
        if( Auth::guard('web')->attempt($creds) ){
            return response()->json(['message' => 'Login successful'], 200);
        }else{
            return response()->json(['message' => 'Incorrect credentials'], 401);
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function createProfile(){
        return response()->json(['message' => 'Create Profile page'], 200);
    }

    public function showProfile($userId){
        $data = UserProfile::where('users_id', $userId)->first();
        return response()->json(['profile' => $data], 200);
    }

    public function editProfile(Request $request){
        $r_id = $request->id;
        $db_profile = DB::select('select * from users_profile where users_profile_id = ?', [$r_id]);
        return response()->json(['profile' => $db_profile], 200);
    }

    public function saveProfile(Request $request)
    {
        $data = new UserProfile();
        $userId = Auth::id();
        $data->users_id = $userId;
        $data->first_name = $request->lname;
        $data->last_name = $request->fname;
        $data->bio = $request->bio;
        $data->email = $request->email;
        $data->save();
        return response()->json(['message' => 'Data Has Been inserted'], 200);
    }

    public function saveEditProfile(Request $request)
    {
        $r_id = $request->users_profile_id;
        $data = UserProfile::find($r_id);
        $userId = Auth::id();
        $data->users_id = $userId;
        $data->first_name = $request->lname;
        $data->last_name = $request->fname;
        $data->bio = $request->bio;
        $data->email = $request->email;
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
