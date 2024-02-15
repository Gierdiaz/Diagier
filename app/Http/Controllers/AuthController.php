<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function RegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function LoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required', 'email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            return redirect()->route('layout', ['user' => $user]);
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Credenciais inválidas']);
    }
}
