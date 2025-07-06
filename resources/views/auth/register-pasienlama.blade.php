<x-guest-layout>
    <div class="min-h-screen bg-cyan-300 py-12 flex flex-col justify-center sm:px-6 lg:px-8">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    <h1 class="text-xl font-bold mt-4">Registrasi Pasien Lama</h1>
                </a>
            </x-slot>

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            @if (!session('pasien'))
                <!-- Step 1: Masukkan NIK -->
                <form method="POST" action="{{ route('register.pasienlama.cek') }}">
                    @csrf
                    <div class="mt-4">
                        <x-label for="nik" :value="__('Masukkan NIK Anda')" />
                        <x-input id="nik" class="block mt-1 w-full" type="text" name="nik" required autofocus />
                    </div>
                    <div class="flex justify-end mt-4">
                        <x-button>
                            {{ __('Cek Data') }}
                        </x-button>
                    </div>
                </form>
            @else
                <!-- Step 2: Form Registrasi Akun -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="nik" value="{{ session('pasien')->nik }}">

                    <div class="mt-4">
                        <x-label :value="'Nama Lengkap'" />
                        <x-input type="text" name="name" class="block mt-1 w-full" value="{{ session('pasien')->nama }}" readonly />
                    </div>

                    <div class="mt-4">
                        <x-label :value="'Alamat'" />
                        <x-input type="text" name="alamat" class="block mt-1 w-full" value="{{ session('pasien')->alamat }}" readonly />
                    </div>

                    <div class="mt-4">
                        <x-label :value="'Tanggal Lahir'" />
                        <x-input type="text" name="lahir" class="block mt-1 w-full" value="{{ session('pasien')->lahir }}" readonly />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Sudah punya akun?') }}
                        </a>

                        <x-button class="ml-4">
                            {{ __('Daftar') }}
                        </x-button>
                    </div>
                </form>
            @endif
        </x-auth-card>
    </div>
</x-guest-layout>
