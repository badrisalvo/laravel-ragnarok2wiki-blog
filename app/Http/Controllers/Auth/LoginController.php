<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $credentials = $this->credentials($request);

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            // Check if user is admin
            if ($user->isAdmin()) {
                return $this->sendLoginResponse($request);
            }

            // Check if user is activated
            if (!$user->activated) {
                return redirect()->route('login')->with('warning','Your Account is not Active!');
            }

            return $this->sendLoginResponse($request);
        }

        return redirect()->intended($this->redirectPath());
    }
}
