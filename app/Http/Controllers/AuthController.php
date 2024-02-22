<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\{ResetPasswordNotification, TwoFactorCodeNotification};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash, Password, Validator};
use Illuminate\Support\Facades\{Mail, Session};
use PragmaRX\Google2FAQRCode\Google2FA;

class AuthController extends Controller
{
    public function RegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'             => 'required|string',
            'email'            => 'required|string|email|unique:users',
            'password'         => 'required|string|confirmed',
            'google2fa_secret' => 'google2fa_secret',
        ]);

        $user = User::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'google2fa_secret' => $request->google2fa_secret,
        ]);

        // Inicializa o Google2FA
        $google2fa = app(Google2FA::class);

        // Gera um segredo para o usuário
        $secretKey = $google2fa->generateSecretKey();

        // Armazena os dados do registro na sessão
        $registration_data                     = $request->all();
        $registration_data['google2fa_secret'] = $secretKey;
        Session::put('registration_data', $registration_data);

        // Gera o código de autenticação de dois fatores
        $twoFactorCode = $google2fa->getCurrentOtp($registration_data['google2fa_secret']);

        // Envia o código por email
        Mail::to($request->email)->send(new TwoFactorCodeNotification($twoFactorCode));

        return view('auth.2fa', ['secret' => $registration_data['google2fa_secret']]);
    }

    public function google2fa()
    {
        return view('auth.2fa');
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
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $user  = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            return redirect()->route('main', ['user' => $user]);
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

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

    public function ForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function ResetPasswordForm(Request $request)
    {
        return view('auth.reset-password', ['request' => $request]);
    }
}
