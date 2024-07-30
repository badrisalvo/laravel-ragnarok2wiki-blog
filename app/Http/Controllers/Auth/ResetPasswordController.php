<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Menampilkan formulir reset password.
     *
     * @param string $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token = null)
    {
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => request('email')]);
    }
    

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('password.request', ['status' => $request->token, 'email' => $request->email])
                             ->with('status', __('Success. Your password has been reset!'));
        } else {
            return back()->withErrors(['email' => [__('Data Invallid or Expired')]]);
        }
    }
}
