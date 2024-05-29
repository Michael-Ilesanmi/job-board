<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        $user = Socialite::driver('google')->user();
        
        $existingUser = User::where('google_id', $user->id)->first();

        if ($existingUser) {
            // Log in the existing user.
            auth()->login($existingUser, true);
        } else {
            // Create a new user.
            $newUser = new User();
            $newUser->first_name = $user->user['given_name'] ?? $user->name;
            $newUser->last_name = $user->user['family_name'] ?? " ";
            $newUser->email = $user->email;
            $newUser->google_id = $user->id;
            $newUser->username = explode('@', $user->email)[0]."_".rand(11111, 99999);
            $newUser->password = bcrypt(request(Str::random())); // Set some random password
            $newUser->save();
            // Log in the new user.
            auth()->login($newUser, true);
        }

        // Redirect to url as requested by user, if empty use homepage
        return redirect()->intended('/');
    }
}
