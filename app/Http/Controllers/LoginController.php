<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
    
        $username = $request->input('username');
        $password = $request->input('password');
    
        $user = User::where('username', $username)->first();

        if ($user && $user->password === $password) {
            Auth::loginUsingId($user->id);
            return redirect('/dashboard');
        } else {
            return back()->with('message', 'Username or password is incorrect.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
