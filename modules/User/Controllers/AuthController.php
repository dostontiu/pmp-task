<?php

namespace Modules\User\Controllers;

use Modules\User\Requests\LoginRequest;
use Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('user::login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user !== null && Hash::check($request->password, $user->password)) {
            Auth::login($user, boolval($request->remember));
            return redirect()->route('home')->with('success', 'Welcome our home page');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
