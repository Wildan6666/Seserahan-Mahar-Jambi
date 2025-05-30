<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 px-4 py-12">
        <div class="w-full max-w-md bg-gray-800 rounded-2xl shadow-xl p-8 text-white">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold">Buat Akun Baru</h2>
                <p class="text-gray-400 text-sm">Silakan isi data di bawah untuk mendaftar</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nama Lengkap')" class="text-white" />
                    <x-text-input id="name" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" class="text-white" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-white" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:ring-indigo-500 focus:border-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-indigo-400 underline">
                        Sudah punya akun?
                    </a>

                    <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow transition">
                        {{ __('Daftar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
