<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\ContentsController;
use App\Http\Controllers\UserController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route Login & Logout
Route::get('', [LoginController::class, 'index'])->name('login');
Route::post('', [LoginController::class, 'check']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); 

// Route Dashboard Berdasarkan Role
Route::middleware('auth', 'checkrole:admin')->get('/admin', function(){
    return view('dashboard.admin');
})->name('admin');

Route::middleware('auth', 'checkrole:artist')->get('/artist', function(){
    return view('dashboard.artist');
})->name('artist');

Route::middleware('auth', 'checkrole:user')->get('/user', function(){
    return view('dashboard.user');
})->name('user_dashboard');

// Route Resource Kelola Musik & Genre
Route::resource('genres', GenresController::class);
Route::resource('content', ContentsController::class);


//====================

Route::middleware(['auth'])->group(function () {
    Route::resource('kelola-user', UserController::class)->names('user');
}); 

//=====================


Route::get('template', function(){
    return view('template.main');
});