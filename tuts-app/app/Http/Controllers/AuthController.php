<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register user
    public function register(Request $request){
        // dd($request->name);
        // validate
        $fields = $request->validate([
            'name'=>['required','max:255'],
            // unque:(what table -> users table)
            'email'=>['required','max:255','email','unique:users'],
            'password'=>['required','min:3','confirmed']
        ]);

        

        // register
       $user = User::create($fields);


        // dd('ok');
        // login
            Auth::login($user);
        // redirect
        return redirect()->route('home');
    }


    // login function
    public function login(Request $request){

           // validate
           $fields = $request->validate([
            'email'=>['required','max:255','email'],
            'password'=>['required']
        ]);
        
        // dd($request);
        // login
        if (Auth::attempt($fields, $request->remember)) {
            // default to dashboard
            return redirect()->intended('dashboard');
        } else{
            return back()->withErrors([
                'failed' => 'The credentials do not match our records'
            ]);
        }   
    }

     // logout user
     public function logout(Request $request) {
        // logout the user
        Auth::logout();
        // invalidate user's session
        $request->session()->invalidate();
        // regenerate csrf token
        $request->session()->regenerateToken();
        // redirect home
        return redirect()->route('posts.index');
        // dd('ok');
     }
}
