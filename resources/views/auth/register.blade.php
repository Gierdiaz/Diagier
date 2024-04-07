<x-sign-layout>

    @if(session('status'))
    <p>{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex justify-center">
            <img src="/img/logo-dark.png" alt="Diagier Logo">
            
        </div>

        <!-- Inputs Wrapper -->
        <div class="flex flex-col gap-2 my-6">

            <!-- Name Input -->
            <div class="flex flex-col gap-2">
                <label for="name" class="cursor-pointer" class="cursor-pointer">Nome *</label>
                <input id="name" class="bg-transparent border-2 border-black rounded-lg px-4 py-1 focus:ring-4 focus:ring-blue-400" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
                <x-input-error :errorMessages="$errors->get('name')" />
            </div>

            <!-- Email Input -->
            <div class="flex flex-col gap-2">
                <label for="email" class="cursor-pointer">E-Mail *</label>
                <input id="email" class="bg-transparent border-2 border-black rounded-lg px-4 py-1 focus:ring-4 focus:ring-blue-400" type="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
                <x-input-error :errorMessages="$errors->get('email')" />
            </div>

            <!-- Password Input -->
            <div class="flex flex-col gap-2">
                <label for="password" class="cursor-pointer">Senha *</label>
                <input id="password" class="bg-transparent border-2 border-black rounded-lg px-4 py-1 focus:ring-4 focus:ring-blue-400" type="password" name="password" autocomplete="new-password" required>
                <x-input-error :errorMessages="$errors->get('password')" />
            </div>

            <!-- Confirm Password Input -->
            <div class="flex flex-col gap-2">
                <label for="password-confirm" class="cursor-pointer">Confirmar Senha *</label>
                <input id="password-confirm" class="bg-transparent border-2 border-black rounded-lg px-4 py-1 focus:ring-4 focus:ring-blue-400" type="password" name="password_confirmation" autocomplete="new-password" required>
            </div>
        </div>

        <button type="submit" class="bg-neutral-900 text-neutral-100 py-3 w-full rounded-lg transition-colors hover:bg-neutral-700 focus:ring-4 focus:ring-blue-400">Registrar</button>
    </form>

    <div class="flex flex-col items-center gap-2 mt-6">
        <span>
            Já possui conta?
            <a href="{{ route('login') }}" class="underline font-medium">Faça Login.</a>
        </span>
    </div>
</x-sign-layout>