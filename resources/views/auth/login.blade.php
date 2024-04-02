<x-sign-layout>
    <div>
        <h2>Login</h2>

        @if(session('status'))
        <p>{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" >
                <x-input-error :errorMessages="$errors->get('email')" />
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" >
                <x-input-error :errorMessages="$errors->get('password')" />
            </div>

            <button type="submit">Login</button>
        </form>

        <div>
            <a href="{{ route('password.request') }}">Forgot password?</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</x-sign-layout>