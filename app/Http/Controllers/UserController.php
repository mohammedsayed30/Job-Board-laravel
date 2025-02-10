<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // to show the register form
    public function register()
    {
        return view('users.register');
    }

    // to show the login form
    public function login()
    {
        return view('users.login');
    }

    // to validate the login
    public function loginValidate(Request $request)
    {
        // check for the  rules
        $loginValidate = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        // return the  information of  this email user
        $user = User::where('email', $request->email)->first();
        // check  if the user exist
        if (! $user) {
            // this mean  the user not registered
            return back()->withErrors(['email' => 'InValid Credentials']);
        }
        // check if the password  is  correct
        if (! Hash::check($request->password, $user->password)) {
            // this mean the password is not correct
            return back()->withErrors(['password' => 'this password is incorrect !']);
        }
        // login in this user and create  session for him
        auth()->login($user);

        // redirect the user to the index page
        return redirect('/')->with('message', 'you have been  Loged in');
    }

    // to logout  the user
    public function logout(Request $request)
    {
        // delete  the loged in session
        auth()->logout();

        // It ensures that any old session data  is removed.
        $request->session()->invalidate();
        // ensures that any  requests tied to the old token cannot be used
        $request->session()->regenerateToken();

        // redirect the user to the index page
        return redirect('/')->with('message', 'you have been  Loged out');
    }

    // to store  the data of the  register form into the table user
    public function store(Request $request)
    {
        $registerValidation = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);
        // hash the password
        $registerValidation['password'] = bcrypt($registerValidation['password']);
        // store the data into the database
        $user = User::create($registerValidation);
        // login in this user and create  session for him
        auth()->login($user);

        // redirect the user to the home page with register message succession
        return redirect('/')->with('message', 'registeration created & loged in Successfully');
    }
}
