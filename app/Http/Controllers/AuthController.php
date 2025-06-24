<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Mail\Welcomemail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect()->route('teacher.dashboard');
            } elseif (Auth::user()->user_type == 3) {
                return redirect()->route('student.dashboard');
            } elseif (Auth::user()->user_type == 4) {
                return redirect()->route('parent.dashboard');
            }
        }
        return view('auth.login');
    }
    public function Authlogin(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->user_type == 1) {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect()->route('teacher.dashboard');
            } elseif (Auth::user()->user_type == 3) {
                return redirect()->route('student.dashboard');
            } elseif (Auth::user()->user_type == 4) {
                return redirect()->route('parent.dashboard');
            }
        } else {
            return redirect()->route('login')->with('danger', 'Something went wrong Try agian!');
        }
    }



    public function ForgotPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->with('error', 'No user found with that email address.');
            }

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return back()->with('success', 'Reset link has been sent to your email.');
        }

        return view('auth.forgot_password');
    }
    public function Sendmail()
    {
        $tomail = 'dakshrajvinder@gmail.com';
        $message = 'kjbfgvfvbia';
        $subject = 'Mail Subject';
        Mail::to($tomail)->send(new Welcomemail($message, $subject));
        return "Mail sent successfully!";
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('info', 'User Logged out successfully');
    }
}
