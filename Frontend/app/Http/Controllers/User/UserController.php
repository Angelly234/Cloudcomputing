<?php

namespace App\Http\Controllers\User;

use Hash;
use App\Models\User;

use Brian2694\Toastr\Facades\Toastr;
use App\Models\UploadPaper;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Scholar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
              return redirect()->back()->with('success','You are now registered successfully');
          }else{
              return redirect()->back()->with('fail','Something went wrong, failed to register');
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
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function createProfile(){
        return view("dashboard.user.create-profile");
    }

    // public function profileList(){

    //    $db_profile = DB::select('select * from users_profile');
    //    $db_download = DB::select('select * from downloads');
    //    $db_paper = DB::select('select * from upload_papers');
    //    $db_scholar = DB::select('select * from scholars');
        
    //     // //Query the table social network
    //     // $db_social = DB::select('select * from tbl_socialnet');

    //     return view("dashboard.scholar.view-profile",[ 
    //         "v_profile"=> $db_profile,
    //         "v_download"=>$db_download,
    //         "v_paper"=> $db_paper,
    //         "v_scholar"=> $db_scholar,
    //         ] );

    // }

    public function showProfile($userId){
 
        $data = UserProfile::where('users_id', $userId)->first();

        return view('dashboard.user.view-profile', [
            'v_profile' => $data,
        ]);
    }

    public function editProfile(Request $request){

        // Get from form
        $r_id = $request->id;

        //Query
        $db_profile = DB::select('select * from users_profile where users_profile_id = ?', [$r_id]);

        return view("dashboard.user.edit-profile",    
        [ 
            "v_profile"=> $db_profile,

        ] 
    
    );
    }

    public function saveProfile(Request $request)
    {
        $data = new UserProfile(); // call model 

        // Get the scholars ID from the session or any other storage method
        $userId = Auth::id();

           $data->users_id =$userId;
           $data->first_name = $request->lname;
           $data->last_name = $request->fname;
           $data->bio = $request->bio;
           $data->email = $request->email;

        // Saving
        $data->save();

        return redirect('/user/user-profile/'. $userId)->with('msg', 'Data Has Been inserted');
        //print_r(Auth::id());

    }

    public function saveEditProfile(Request $request)
    {
        //Option #3 Okay by find id
        // Get from form
        $r_id = $request->users_profile_id;

        $data = UserProfile::find($r_id);

        // Get the scholars ID from the session or any other storage method
        $userId = Auth::id();

           $data->users_id =$userId;
           $data->first_name = $request->lname;
           $data->last_name = $request->fname;
           $data->bio = $request->bio;
           $data->email = $request->email;

        // Saving
        $data->save();

        return redirect('/user/user-profile/'. $userId)->with('msg', 'Data Has Been Updated');
        //print_r(Auth::id());

    }

    public function search(){

        $search_text = $_GET['query'];
        $v_paper = UploadPaper::where('title', 'LIKE', '%'.$search_text.'%')->with('user')->get();
        // $v_scholar = UploadPaper::where('title', 'LIKE', '%'.$search_text.'%')->get();

        return view('dashboard.user.search', compact('v_paper'));
    }

    public function showPaper(Request $request){
        $v_paper = UploadPaper::all();
        return view('dashboard.user.template-results', compact('v_paper'));

    }
    

    


}

