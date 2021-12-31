<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User; 
use DB;
class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    public function showResetForm(Request $request, $token = null)
        {
            return view('auth.passwords.reset')->with(
                ['token' => $token, 'username' => $request->username]
            );
        }
    protected function rules()
    {
        return [
            'token' => 'required', 
            'username' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }
    protected function credentials(Request $request)
    {
        return $request->only(
            'username', 'password', 'password_confirmation', 'token'
        );
    }
    public function sendResetLinkEmail(Request $request)
    {
        $this->validate($request, ['username' => 'required'], ['username.required' => 'Please enter your username.']);

         $response = $this->broker()->sendResetLink(
            $request->only('username')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response));
        }

        return back()->withErrors(
            ['email' => trans($response)]
        );
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
                    ->withInput($request->only('username'))
                    ->withErrors(['username' => trans($response)]);
    }
}
