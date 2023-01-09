<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\Hash;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'rpassword' => 'same:password',
        ]);
        $data = $request->all();
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('login-user')->with('login', 'Account Created Successfuly');
    }

    public function login()
    {
        if (Auth::check()) {
            return view('dash')->with('welcome', 'Welcome Back');
        }

        return view('login');
    }

    public function login_process(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $Authanticate = $req->only('email', 'password');
        if (Auth::attempt($Authanticate)) {
            return view('dash')->with('logged', 'Welcome to Dashboard');
        }
        return redirect('login-user')->with('login_fail', 'Login Details are not Valid');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dash');
        }

        return redirect("login-user")->with('not_allowed', 'You are not allowed to access');
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login-user');
    }
}
