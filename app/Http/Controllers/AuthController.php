<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        Session::flash('statusFailed', 'failed');
        Session::flash('message', 'Login failed !!!');

        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function register()
    {
        return view('register');
    }

    public function registering(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'role_id' => 'required',
        //     'password' => 'required|confirmed',
        // ]);
        // dd($request->all());
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'role_id' => 3,
        //     'password' => Hash::make($request->password),
        // ]); 
        // $user = User::create($request->all());

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = 3;
        $user->password = $request->password;
        $user->save();

        if ($user) {
            Session::flash('statusSuccess', 'success');
            Session::flash('message', 'You are registered!!!');
        }

        return redirect('/login');
    }
}
