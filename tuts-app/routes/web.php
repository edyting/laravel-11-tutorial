<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');

Route::redirect('/','posts');

// user's posts
Route::get('/{user}/posts',[DashboardController::class,'userPosts'])->name('posts.user');

Route::resource('posts',PostController::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});


// routes accessible to guests
Route::middleware('guest')->group(function (){
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');


    Route::post('/register',[AuthController::class,'register']);

    Route::get('/login', function () {
    return view('auth.login');
    })->name('login');

    Route::post('/login',[AuthController::class,'login']);
});
