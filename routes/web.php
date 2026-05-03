<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\http\Controllers\GenresController;
use App\http\Controllers\ContentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('', [LoginController::class,'index'])->name('login');
Route::post('', [LoginController::class,'check']);
Route::post('/logout', [LoginController::class,'logout'])->name('logout'); 

Route::middleware('auth', 'checkrole:admin')->get('/admin', function(){
    return view('dashboard.admin');
})->name('admin');
Route::middleware('auth', 'checkrole:artist')->get('/artist', function(){
    return view('dashboard.artist');
})->name('artist');
Route::middleware('auth', 'checkrole:user')->get('/user', function(){
    return view('dashboard.user');
})->name('user_dashboard');

route::resource('genres', GenresController::class);

Route::resource('content', ContentsController::class);

Route::get('template',function(){
    return view('template.main');
});