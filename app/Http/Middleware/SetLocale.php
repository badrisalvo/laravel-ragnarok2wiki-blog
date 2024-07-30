<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        } else {
            // Jika session locale belum ada, gunakan locale default (Bahasa Indonesia)
            App::setLocale('id');
        }
        
        return $next($request);
    }
}
