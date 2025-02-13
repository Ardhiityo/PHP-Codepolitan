<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login', ['title' => "Login"]);
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only("email", "password"))) {
            return redirect('/posts');
        } else {
            return redirect('/')->with([
                'error_message' => 'Email or password is wrong'
            ])->withInput();
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $registerRequest)
    {
        $data = $registerRequest->validated();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect('/');
    }
}
