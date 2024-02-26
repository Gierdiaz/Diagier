<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\{
    ResetPasswordNotification,
    TwoFactorCodeNotification
};
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    Hash,
    Mail,
    Password,
    Session,
    Validator
};
use Illuminate\Support\Str;
use PragmaRX\Google2FAQRCode\Google2FA;

class AuthController extends Controller
{
    public function RegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required|string',
            'email'            => 'required|string|email|unique:users',
            'password'         => 'required|string|confirmed',
            'google2fa_secret' => 'google2fa_secret',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        try {
            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Initializes Google2FA
            $google2fa = app(Google2FA::class);

            // Generates a secret for the user
            $secretKey = $google2fa->generateSecretKey();

            // Stores the log data in the session
            $registration_data                     = $request->all();
            $registration_data['google2fa_secret'] = $secretKey;
            Session::put('registration_data', $registration_data);

            // Generates the two-factor authentication code
            $twoFactorCode = $google2fa->getCurrentOtp($registration_data['google2fa_secret']);

            // Send the code by email
            Mail::to($request->email)->send(new TwoFactorCodeNotification($twoFactorCode));

            $QR_Image = $google2fa->getQRCodeInline(
                config('app.name'),
                $registration_data['email'],
                $registration_data['google2fa_secret']
            );

            return view('auth.2fa', ['QR_Image' => $QR_Image, 'secret' => $registration_data['google2fa_secret']]);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public function google2fa()
    {
        return view('auth.2fa');
    }

    public function LoginForm()
    {
        return view('auth.login');
    }

    protected function clearLoginAttempts(Request $request)
    {
        $limiter = app(RateLimiter::class);

        $limiter->clear($this->throttleKey($request));
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $token = $user->createToken('token-name')->plainTextToken;

            $this->clearLoginAttempts($request);

            return redirect()->route('main', ['user' => $user, 'token' => $token]);
        }

        //$this->incrementLoginAttempts($request);

        return back()->withErrors([
            'email' => 'The credentials provided are incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('login');
    }

    //TODO: Check forgot password logic
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
