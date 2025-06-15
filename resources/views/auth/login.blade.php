<x-guest-layout>
    <div class="min-h-screen" style="background-color: #4ed6dd;">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    <h1>Halaman Login</h1>
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Mauskkan Email Terdaftar')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />
                </div>

                <div class="mt-4">
                    <!-- Button Container -->
                    <div class="flex justify-center">
                        <x-button class="w-full justify-center py-2">
                            {{ __('Masuk') }}
                        </x-button>
                    </div>

                    <!-- Links Container -->
                    <div class="flex flex-col space-y-2 mt-4">
                        <a href="{{ route('register-user') }}" class="text-sm text-center text-gray-600 hover:text-gray-900">
                            {{ __('Belum punya akun?') }}
                        </a>

                        @if (Route::has('password.request'))
                            <a class="text-sm text-center text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </x-auth-card>
    </div>
</x-guest-layout>
