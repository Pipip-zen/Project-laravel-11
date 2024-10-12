<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class ForgotPasswordController extends Controller
{
    public function index() {
    
        return view('forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'username' => 'required',
        ]);
    
        $user = User::where('username', $request->input('username'))->first();
    
        if (!$user) {
            return back()->with('status', 'Username tidak ditemukan.');
        }
    
        return redirect()->route('password.reset', ['username' => $user->username]);
    }
    
    public function showResetForm(Request $request, $username)
    {
        $user = User::where('username', $username)->first();
    
        if (!$user) {
            return back()->with('status', 'Username tidak ditemukan.');
        }
    
        return view('reset-password', ['user' => $user]);
    }

    public function reset(Request $request) {
    $request->validate([
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
    ]);

    $user = User::where('username', $request->input('username'))->first();

    if (!$user) {
        return back()->with('status', 'Username tidak ditemukan.');
    }

    $user->password = bcrypt($request->input('password'));
    $user->save();

    return redirect()->route('login')->with('status', 'Password berhasil diubah!');
    }
}