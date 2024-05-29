<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthFormRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    function register(): View
    {
        return view('auth.register');
    }

    function store(AuthFormRequest $request): RedirectResponse
    {
        $data = $request->safe()->only(['email','first_name', 'last_name','password','password_confirm']);
        $data['password'] = bcrypt($data['password']);
        $data['username'] = explode('@', $data['email'])[0]."_".rand(11111, 99999);
        logger($data);
        $user = User::create($data);
        auth()->login($user);
        $request->session()->regenerate();
        return redirect("/");
    }

    function login(): View
    {
        return view('auth.login');
    }

    function auth(AuthFormRequest $request): RedirectResponse
    {
        $data = $request->safe()->only(['email','password']);
        if(auth()->attempt($data)){
            $request->session()->regenerate();
            return redirect("/");
        }
        return back()->withErrors([
            'email' => 'Incorrect login details.',
        ])->onlyInput('email');  
    }

    function logout(Request $request) : RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
