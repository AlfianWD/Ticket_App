<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboard/login');
    }

    public function login(Request $request)
    {
        
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === 'admin123') {
            
            return redirect()->route('dashboard')->with('success','Product successfully added.');
        } else {
            return back()->with('message', 'Username atau password salah.');
        }
    }
}
