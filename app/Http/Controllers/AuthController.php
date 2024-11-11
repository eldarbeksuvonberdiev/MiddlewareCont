<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function loginPage(){
    //     return view('login');
    // }

    // public function registerPage(){
    //     return view('register');
    // }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    // public function login(Request $request){
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:5',
    //     ]);
        
    //     if(Auth::attempt(['email'=> $request->email,'password' => $request->password])){
    //         return redirect()->route('main');
    //     }
    //     return redirect()->route('login');
    // }

    // public function register(Request $request){
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required'
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     Auth::login($user);
    //     return redirect()->route('main');
    // }
}

