<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Scholar\ScholarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ========== Home Page Route ==========
Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/login-option', function () {
    return view('login-option');
});

Route::get('/signup-option', function () {
    return view('signup-option');
});

Route::get('/home-search', [HomeController::class,'showPapers']);
Route::get('/show-paper', [HomeController::class,'showPapers']);
Route::get('/search', [HomeController::class,'search']);

// ========== End Home Page Route ==========



// Create route for user authentication
Auth::routes();

// ========== User Page Route ===============
Route::prefix('user')->name('user.')->group(function(){
  
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
          Route::view('/home','dashboard.user.home')->name('home');
          Route::get('/show-paper', [UserController::class,'showPaper']);
          Route::get('/search', [UserController::class,'search']);
          Route::get('/scholar-profile/{id}', [ScholarController::class,'showProfile']);   
          Route::get('/edit-profile/{id}', [UserController::class,'editProfile']);
          Route::get('/create-profile', [UserController::class,'createProfile']);
          Route::get('/user-profile/{id}', [UserController::class,'showProfile']);
          Route::post('/save-edit-profile', [UserController::class,'saveEditProfile'])->name('save.edit.profile');
          Route::post('/save-profile',[UserController::class,'saveProfile'])->name('save.profile');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');
        //Route::get('/profile-list', [UserController::class,'profileList']);
    });
});

// ========== End User Page Route ===============


// ========== Scholar Page Route ===============

Route::prefix('scholar')->name('scholar.')->group(function(){

       Route::middleware(['guest:scholar','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.scholar.login')->name('login');
            Route::view('/register','dashboard.scholar.register')->name('register');
            Route::post('/create',[ScholarController::class,'create'])->name('create');
            Route::post('/check',[ScholarController::class,'check'])->name('check');
       });

       Route::middleware(['auth:scholar','PreventBackHistory'])->group(function(){

            Route::view('/home','dashboard.scholar.home')->name('home');
            Route::get('/show-paper/{id}', [ScholarController::class,'showPaper']);
            Route::get('/upload-paper', [ScholarController::class,'uploadPaper'])->name('scholar.upload-paper');
            Route::post('/upload-papers', [ScholarController::class,'storePaper']);
            Route::get('/edit-profile/{id}', [ScholarController::class,'editProfile']);
            Route::get('/create-profile', [ScholarController::class,'createProfile'])->name('scholar.create-paper');
            Route::get('/scholar-profile/{id}', [ScholarController::class,'showProfile']);
            Route::post('/save-edit-profile', [ScholarController::class,'saveEditProfile'])->name('save.edit.profile');
            Route::post('/save-profile',[ScholarController::class,'saveProfile'])->name('save.profile');
            Route::post('logout',[ScholarController::class,'logout'])->name('logout');
            Route::get('/add-new',[ScholarController::class,'add'])->name('add');
            // Route::get('/profile-list', [ScholarController::class,'profileList']);
       });

});

// ========== End Scholar Page Route ===============
