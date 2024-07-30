<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Http\Controllers\CommentController;
use Carbon\Carbon;
use Exception;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {
                Auth::login($finduser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'tipe' => '3',
                    'password' => bcrypt('my-google')
                ]);

                Auth::login($newUser);
            }

            // Arahkan kembali ke URL postingan sebelumnya jika ada, jika tidak arahkan ke halaman utama
            $redirectUrl = Session::get('previous_url', '/');
            return redirect($redirectUrl);
        } catch (\Exception $e) {
            return redirect()->route('auth.google')->with('error', 'There was an issue logging in with Google.');
        }
    }
}