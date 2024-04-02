<x-sign-layout>
    <div>
        <h2>Login</h2>

        @if(session('status'))
        <p>{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
                <label for="email">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <label for="password">Password</label>
                <input type="password" name="password" required>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <button type="submit">Login</button>
        </form>

        <div>
            <a href="{{ route('password.request') }}">Forgot password?</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</x-sign-layout>