<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class FacebookAuthController extends Controller
{
    public function redirectToFacebook(): RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback(): RedirectResponse
    {
        $user = Socialite::driver('facebook')->user();

        logger(json_encode($user));

        $existingUser = User::where('facebook_id', $user->id)->first();

        if ($existingUser) {
            // Log in the existing user.
            auth()->login($existingUser, true);
        } else {
            // Create a new user.
            $newUser = new User();
            $newUser->first_name = $user->user['given_name'] ?? $user->name;
            $newUser->last_name = $user->user['family_name'] ?? " ";
            $newUser->email = $user->email;
            $newUser->facebook_id = $user->id;
            $newUser->username = explode('@', $user->email)[0]."_".rand(11111, 99999);
            $newUser->password = bcrypt(request(Str::random())); // Set some random password
            $newUser->save();
            // Log in the new user.
            auth()->login($newUser, true);
        }

        // Redirect to url as requested by user, if empty use / homepage
        return redirect()->intended('/');
    }
}
