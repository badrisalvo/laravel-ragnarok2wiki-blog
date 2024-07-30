<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Log untuk debugging
        Log::info('AdminMiddleware: Checking if user is admin');

        // Periksa apakah pengguna telah login dan memiliki tipe 0
        if (Auth::check() && Auth::user()->isAdmin()) {
            Log::info('AdminMiddleware: User is admin');
            return $next($request);
        }

        Log::warning('AdminMiddleware: Unauthorized access attempt');
        // Jika tidak, kembalikan respons akses ditolak
        abort(403, 'Unauthorized action.');
    }
}
