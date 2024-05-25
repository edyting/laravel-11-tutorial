<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Register user
    public function register(Request $request){
        // dd($request->name);
        // validate
        $request->validate([
            'name'=>['required','max:255'],
            'email'=>['required','max:255','email'],
            'password'=>['required','min:3','confirmed']
        ]);

        dd('ok');

        // register

        // login

        // redirect
    }
}
