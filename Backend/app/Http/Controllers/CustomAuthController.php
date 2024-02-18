<?php

namespace App\Http\Controllers;

use Hash;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view('auth/login');
    }
    public function registration(){
        return view('auth/registration');
    }
    public function registerAdmin(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:5|max:12',
        ]);
        $admin =new Admin();
        $admin->name =$request->name;
        $admin->email =$request->email;
        $admin->password =Hash::make($request->password);
        $res=$admin->save();
        if($res){
            return back()->with('success','You have registered successfully');
        }else{
            return back()->with('fail','Somthing wrong');
        }
    }

    public function loginAdmin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        $admin=Admin::where('email','=',$request->email)->first();
        if($admin){
            if(Hash::check($request->password,$admin->password)){
                $request->session()->put('loginId',$admin->id);
                return redirect("/home");
            }
            else{
                return back()->with('fail','Password not matches.');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }
    }
    
    // when want ot logout direct it back to logout 
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
    }

}

