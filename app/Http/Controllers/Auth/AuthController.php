<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function register()
    {
        return view('auth.register');
    }

    function store()
    {
        
    }

    function login()
    {
        return view('auth.login');
    }

    function auth()
    {
        
    }
}
