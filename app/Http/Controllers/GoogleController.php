<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors('Something went wrong with Google authentication: ' . $e->getMessage());
        }

        $find_user = User::where('email', $user->getEmail())->first();
        if ($find_user) {
            Auth::login($find_user);
            return redirect('/dashboard');
        } else {
            $new_user = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => Hash::make('admin123')
            ]);
            Auth::login($new_user);
            return redirect('/dashboard');
        }
    }
}
