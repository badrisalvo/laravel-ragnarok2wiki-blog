<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckUserActivation
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        
        // Memeriksa apakah pengguna memiliki tipe '3'
        if ($user && $user->tipe == '3') {
            return redirect('/')->withErrors(['Unauthorized action.']);
        }

        // Memeriksa apakah pengguna telah diaktifkan
        if ($user && $user->tipe != '0' && $user->activated_until && $user->activated_until->isPast()) {
            Auth::logout();
            return redirect()->route('login')->withErrors(['warning'=>'Your account is not active. Please contact admin.']);
        }

        return $next($request);
    }
}
