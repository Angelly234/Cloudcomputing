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
              return redirect()->back()->with('success','You are now registered successfully as Scholar');
          }else{
              return redirect()->back()->with('fail','Something went Wrong, failed to register');
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
            return redirect()->route('scholar.home');
        }else{
            return redirect()->route('scholar.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('scholar')->logout();
        return redirect('/');
    }

    public function createProfile(){
        return view("dashboard.scholar.create-profile");
    }

    public function showProfile($userId){
 
        $data = ScholarProfile::with('papers')->where('scholars_id', $userId)->first();

        return view('dashboard.scholar.view-profile', [
            'v_profile' => $data,
        ]);
    }

    public function editProfile(Request $request){

        // Get from form
        $r_id = $request->id;

        //Query
        $db_profile = DB::select('select * from scholars_profile where scholars_profile_id = ?', [$r_id]);
        // $db_paper = DB::select('select * from upload_papers');
        // $db_scholar = DB::select('select * from scholars');
        return view("dashboard.scholar.edit-profile",    
        [ 
            "v_profile"=> $db_profile,
        ] 
    
    );
    }

    public function saveProfile(Request $request)
    {
        $data = new ScholarProfile(); // call model 

        // Get the scholars ID from the session or any other storage method
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

        return redirect('/scholar/scholar-profile/'. $userId)->with('msg', 'Data Has Been inserted');
        //print_r(Auth::id());

    }

    public function saveEditProfile(Request $request)
    {
        //Option #3 Okay by find id
        // Get from form
        $r_id = $request->scholars_profile_id;

        $data = ScholarProfile::find($r_id);

        // Get the scholars ID from the session or any other storage method
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

        return redirect('/scholar/scholar-profile/' . $userId)->with('msg', 'Data Has Been Updated');

    }

    public function uploadPaper(){
        return view('dashboard.scholar.upload-paper');
    }

    public function storePaper(Request $request){

        // dd($request->file('file'));
        $request->validate([
            'title'   => 'required|string|max:255',
            'description'    => 'required|max:300',
            'website' => 'required|max:255',
            // 'file'  => 'required|file|max:10240',
            'publish_date' => 'required|date_format:Y-m-d'
        ]);

        $data = $request->input();
        // dd($data);
        
        // move the uploaded file to the public/assets/files directory with the original name
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
                return redirect('scholar/show-paper/'. $userId)->with('fail', 'Something went wrong, try again later.');
            }
    
            return redirect('scholar/show-paper/'. $userId)->with('success', 'Data has been saved successfully.');
    }

    public function showPaper(Request $request, $userId){

        //get all the uploaded paper of certain scholar
        $data = UploadPaper::where('scholars_id', $userId)->get();
        return view('dashboard.scholar.show-paper', compact('data'));

    }

    // public function profileList(){

    //    $db_profile = DB::select('select * from scholars_profile');
    //    $db_paper = DB::select('select * from upload_papers');
    //    $db_scholar = DB::select('select * from scholars');
        
    //     // //Query the table social network
    //     // $db_social = DB::select('select * from tbl_socialnet');

    //     return view("dashboard.scholar.view-profile",[ 
    //         "v_profile"=> $db_profile,
    //         "v_paper"=> $db_paper,
    //         "v_scholar"=> $db_scholar,
    //         ] );

    // }

}
