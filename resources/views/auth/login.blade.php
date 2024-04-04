<x-sign-layout>
    @if(session('status'))
    <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex flex-col items-center gap-4">
            <img src="/img/logo-dark.png" alt="Diagier Logo">
            <span class="text-2xl font-bold">Bem-vindo de volta!</span>
        </div>

        <div class="flex flex-col gap-6 my-6">
            <div class="flex flex-col gap-2">
                <label for="email" class="cursor-pointer">E-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-transparent border-2 border-black rounded-lg px-4 py-1 focus:ring-4 focus:ring-blue-400">
                <x-input-error :errorMessages="$errors->get('email')" />
            </div>

            <div class="flex flex-col gap-2">
                <label for="password" class="cursor-pointer">Password</label>
                <input type="password" id="password" name="password" class="bg-transparent border-2 border-black rounded-lg px-4 py-1 focus:ring-4 focus:ring-blue-400">
                <x-input-error :errorMessages="$errors->get('password')" />
            </div>
        </div>

        <button type="submit" class="bg-neutral-900 text-neutral-100 py-3 w-full rounded-lg transition-colors hover:bg-neutral-700 focus:ring-4 focus:ring-blue-400">Login</button>
    </form>

    <div class="flex flex-col items-center gap-2 mt-6">
        <span>
            Esqueceu sua senha?
            <a href="{{ route('password.request') }}" class="underline font-medium">Recuperar Senha</a>
        </span>
        <span>
            Ainda Não possui conta?
            <a href="{{ route('register') }}" class="underline font-medium">Registre-se</a>
        </span>
    </div>

    <div class="flex flex-col gap-4 mt-6">
        <button type="button" class=" font-medium text-lg flex gap-2 items-center justify-center py-3 border-2 border-black rounded-lg hover:bg-neutral-200 transition-colors focus:ring-4 focus:ring-blue-400">
            <img src="/img/icon-google.svg" alt="">
            Login com Google
        </button>
        <button type="button" class="bg-blue-600 text-neutral-100 font-medium text-lg  flex gap-2 items-center justify-center py-3 rounded-lg hover:bg-blue-700 transition-colors focus:ring-4 focus:ring-blue-400">
            <img src="/img/icon-facebook.svg" alt="">
            Login com facebook
        </button>
    </div>
</x-sign-layout>