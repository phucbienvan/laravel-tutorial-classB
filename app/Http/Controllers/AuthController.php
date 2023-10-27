<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->route('index.posts');
        }

        return redirect()->back()->with([
            'fail' => 'Login fail'
        ]);
    }

    public function formRegister()
    {
        return view('users.register');
    }

    public function register(RegisterRequest $request)
    {
        $params = $request->validated();
        $params['password'] = bcrypt($params['password']);

        $user = User::create($request->validated());

        if ($user) {
            return redirect()->route('form_login');
        }

        return redirect()->back()->with([
            'fail' => 'Register fail'
        ]);
    }
}
