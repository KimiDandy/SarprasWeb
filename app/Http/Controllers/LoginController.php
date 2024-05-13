<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function indexLogin(){
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('username', 'password');
    $user = User::where('username', $credentials['username'])->first();

    if ($user && $this->validatePassword($credentials['password'], $user->password)) {
        Auth::login($user);

        // Redirect user based on their role
        if ($user->role === 'Siswa') {
            return redirect()->route('pages.inventaris_siswa');
        } elseif ($user->role === 'Toolman') {
            return redirect()->route('pages.inventaris_toolman');
        }
    }
    return back()->withErrors(['username' => 'Username atau password salah']);
}

    protected function validatePassword($password, $hashedPassword)
    {
        // Perform your custom password validation here
        return $password === $hashedPassword;
    }
}
