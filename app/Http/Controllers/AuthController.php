<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function RegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Registrar um novo usuário.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
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

    /**
     * Autenticar um usuário.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            return redirect()->route('main', ['user' => $user]);
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    /**
     * Desconectar o usuário autenticado (logout).
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Enviar e-mail com link para redefinição de senha.
     */
    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }

        $status = Password::sendResetLink(
            $request->only('email'),
            new ResetPasswordNotification(Password::broker()->createToken($request->only('email')))
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => __($status)])
            : response()->json(['error' => __($status)], 400);
    }

    /**
     * Exibir formulário para esquecer a senha.
     *
     * @return \Illuminate\View\View
     */
    public function ForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Exibir formulário para redefinir a senha.
     *
     * @return \Illuminate\View\View
     */
    public function ResetPasswordForm(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }
}
