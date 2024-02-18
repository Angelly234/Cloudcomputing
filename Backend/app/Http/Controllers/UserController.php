<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   
    // get database 
        public function users(){
            $users = DB::select('SELECT * FROM users WHERE ban = 0');
            return view("all-users", ["users" => $users]);
        }
    
        public function banUser(){
            $ban = DB::select('SELECT * FROM users WHERE ban = 1');
            return view("ban-users", ["ban" => $ban]);
        }
    
        // ban user 
        public function updateBanUser(Request $request){
            $users_id = $request->query('users_id');
            $ban = DB::table('users')->where('users_id', $users_id)->update(
                [
                    'ban' => 1,
                ]
            );
            return redirect()->back();
        }
    
        // unban user 
        public function unbanUser(Request $request){
            $users_id = $request->query('users_id');
            $ban = DB::table('users')->where('users_id', $users_id)->update(
                [
                    'ban' => 0,
                ]
            );
            return redirect()->back();
        }
}
