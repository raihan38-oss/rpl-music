<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class LoginController extends Controller
{
    function index(){
        return view('login/index');
    }
    function check(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $credentials = $request->only('email','password');
        $user = User::where('email',$credentials['email'])->first();
            if($user && Hash::check($credentials['password'], $user->password)){
                Auth::login($user);
            if($user->role === 'admin'){
                return redirect('/admin');

            }elseif($user->role === 'user'){
                return redirect('/user');

            }elseif($user->role === 'artist'){
                return redirect('/artist');
            }
        }
        return back()->withError(['email'=>'Email atau password tidak']);
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
