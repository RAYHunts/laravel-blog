<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/profile');
    }
    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/profile');
    }
    public function login()
    {
        return view('user.login');
    }
    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}