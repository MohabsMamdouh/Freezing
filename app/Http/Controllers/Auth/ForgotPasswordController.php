<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\User; 
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;


    public function showForgetPasswordForm()
    {
        return view('auth.passwords.email');
    }


    public function submitForgetPasswordForm(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request['email'],
            'token' => $token,
            'created_at' => now(),
        ]);

        $user = User::where('email', $request['email'])->get();

        return redirect(route('sendEmail', ['user' => $user[0]->name, 'email' => $user[0]->email, 'token' => $token]));
        
    }
}
