<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function showLogin()
    {

        return view('layouts.login');
    }

    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'O email é obrigatório!',
            'password.required' => 'A password é obrigatória!',
        ]);

        $login = User::where('email', $request->email)->first();

        // dd($login->password);

        if (!$login) {
            dd("login invalido");
            return redirect('/login')->with('status', 'Dados inválidos!');
        }
        if ($request->password == $login->password) {
            session()->put('usuario', $login);
            dd('logou com sucesso');
        } else {
            dd("senha invalida");
            return redirect('/login')->with('status', 'password inválida!');
        }


        $userEmail = User::where('email', $request->email)->get();
        $userPassword = User::where('password', $request->password)->get();




        if ($request->session()->exists('usuario')) {
            $request->session()->forget('usuario');
        }



        if ($userPassword[0]->password == $request->password && $userEmail[0]->email == $request->email) {
            $request->session()->regenerate();

            dd('logou');
        } else {
            dd('Não Logou');
        }
    }

    public function registerUser(Request $request)
    {
        // dd($request->cpf);

        User::create([
            'name' => $request->name,
            // 'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
}
