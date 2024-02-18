<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Homepagecontroller extends Controller
{
    public function users()
    {
        $users = DB::select('SELECT * FROM users');
        $scholars = DB::select('SELECT * FROM scholars');
        $upload= DB::select('SELECT * FROM upload_papers');
        $usersCount = count($users);
        $scholarsCount = count($scholars);
        $uploadCount=count($upload);
        return view("homepage", compact('users','scholars','upload', 'usersCount', 'scholarsCount','uploadCount'));
    }


}

