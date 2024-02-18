<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Pagescontroller;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ScholarController;
use App\Http\Controllers\Homepagecontroller;
use App\Http\Controllers\CustomAuthController;
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
// ============================ Dashboard  ===============================
Route::get('/home', [Homepagecontroller::class,'users'])->middleware('isLoggedIn');

// ========== Login and Logout and Signup for Admin  =====================
Route::get('/',[CustomAuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::post('/login-admin',[CustomAuthController::class,'loginAdmin'])->name('login-admin');
Route::get('/logout',[CustomAuthController::class,'logout']);
Route::get('/registration',[CustomAuthController::class,'registration']);
Route::post('/register-admin',[CustomAuthController::class,'registerAdmin'])->name('register-admin');


// ========== Ban and Unban and View route of user  =====================
Route::get('/all-users', [UserController::class, 'users'])->middleware('isLoggedIn');
Route::get('/ban', [UserController::class, 'banUser'])->middleware('isLoggedIn');
Route::post('/banUpdate', [UserController::class, 'updateBanUser'])->middleware('isLoggedIn');
Route::post('/unban', [UserController::class, 'unbanUser']);

// ========== Ban and Unban and View route of user ==========================
Route::get('/all-scholars', [ScholarController::class, 'scholars'])->middleware('isLoggedIn');
Route::get('/banScholar', [ScholarController::class, 'banScholar'])->middleware('isLoggedIn');
Route::post('/banUpdateScholar', [ScholarController::class, 'updateBanscholar']);
Route::post('/unbanScholar', [ScholarController::class, 'unbanScholar']);

// =============================== Upload  ===================================
Route::get('/upload', [UploadController::class, 'upload'])->middleware('isLoggedIn');

