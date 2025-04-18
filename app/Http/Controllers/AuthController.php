<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view("register");
    }

    public function register(Request $request)
    {
        User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone" => $request->phone
        ]);

        return redirect()->route("login.form");
    }

    public function showLoginForm()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            return redirect("/");
        } else {
            return redirect()->route("login.form");
        }
    }

    public function unauthorised()
    {
        return view("unauthorised");
    }
}
