<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    public function upload()
    {
        $upload= DB::select('SELECT * FROM upload_papers');
        return view("upload", compact('upload'));
    }
    
}
