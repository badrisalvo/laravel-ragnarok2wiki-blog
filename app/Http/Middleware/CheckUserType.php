<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckUserType
{
    public function handle($request, Closure $next, $type)
    {
        $user = User::find($request->route('id'));

        // Periksa apakah tipe pengguna sesuai dengan yang diizinkan
        if ($user && $user->tipe == $type) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
