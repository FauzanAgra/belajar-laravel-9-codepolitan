<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('posts');
        } else {
            return redirect('login')->with('error_message', 'Wrong email or password to login');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login')->with('logout_message', 'Successful logout');
    }
}
