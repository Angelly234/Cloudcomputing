<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScholarController extends Controller
{
   
    // get database 
        public function scholars(){
            $scholars= DB::select('SELECT * FROM scholars WHERE ban = 0');
            return view("all-scholars", ["scholars" => $scholars]);
        }
    
        public function banScholar(){
            $ban= DB::select('SELECT * FROM scholars WHERE ban = 1');
            return view("ban-scholars", ["ban" => $ban]);
        }
    
        // ban user 
        public function updateBanScholar(Request $request){
            $scholars_id = $request->query('scholars_id');
            $ban = DB::table('scholars')->where('scholars_id', $scholars_id)->update(
                [
                    'ban' => 1,
                ]
            );
            return redirect()->back();
        }
    
        // unban user 
        public function unbanScholar(Request $request){
            $scholars_id = $request->query('scholars_id');
            $ban = DB::table('scholars')->where('scholars_id', $scholars_id)->update(
                [
                    'ban' => 0,
                ]
            );
            return redirect()->back();
        }
}
