<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class UserController extends Controller
{
    // register function
    function registerForm(Request $request)
    {
        $validate = $request->validate([//validating the user request
            "username" => "required|string|min:5|max:25",
            "email" => "required|email",
            "password" => "required|min:4|max:8|confirmed",
        ]);
        $checkUser = User::where("email", $request->email)->first();//checking the user exists or not
        if ($checkUser) {
            $request->session()->flash("userExist", "User already exists.");
            return back();
        }

        $addUser = User::create([//adding the user in the database
            "name" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);
        if ($addUser) {
            return redirect()->route("login");
        } else {
            $request->session()->flash("UserError", "Can't add the user! Please try again.");
            return back();
        }

    }

    function loginForm(Request $request)
    {
        $validate = $request->validate([
            "email" => "required|email",
            "password" => "required|min:4|max:8",
        ]);

        $userExist = User::where("email", $request->email)->first();
        if (!$userExist) {//checking the user email exist in database
            $request->session()->flash("Emailexists", "Email is invalid! Please try again");
            return back();
        }
        // checking the user password hash in database
        if (!Hash::check($request->password, $userExist->password)) {
            $request->session()->flash("failedPassword", "Invalid Password! Please try again");
            return back();
        }

        $authUser = Auth::attempt($validate);
        if ($authUser) {
            return redirect()->route("dashboard");
        } else {
            session()->flash("AuthFailed", "Technical Error! Please try again");
            return back();
        }

    }


    // dashboard function
    function dashboard()
    {
        if (Gate::allows("isAdmin")) {
            $readData = User::get();//getting all user data
            return view("dashboard", ["datas" => $readData]);
        } else {
            return redirect()->route("user");
        }
    }


    // author funtion
    function author()
    {
        if (Gate::allows("isAuthor")) {
            return view("author");
        } else {
            return redirect()->route("user");
        }
    }

    function user()
    {
        return view("user");
    }


    // logout crontroller
    function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
}

