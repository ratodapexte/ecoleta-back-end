<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model\User;

class UserController extends Controller
{
    public function showLogin() {

        return view('layouts.login');
    }

    public function auth(Request $request)
    {
        // $user = User::all();

        // dd($user);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            dd('logou');
        }
 
        else {
            dd('Não Logou');
        }
    }
}
