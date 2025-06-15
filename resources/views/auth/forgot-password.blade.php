<x-guest-layout>
    <div class="mb-6 text-center ">
        <h1 class="text-2xl font-bold text-gray-800">Lupa Password?</h1>
        <p class="mt-2 text-sm text-gray-600">
            Tidak masalah. Masukkan alamat email Anda dan kami akan mengirimkan tautan untuk mengatur ulang password Anda.
        </p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 text-green-600 font-medium text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="block w-full mt-1"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                placeholder="Masukkan email Anda"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-end">
            <x-primary-button class="px-6 py-2">
                {{ __('Kirim Tautan Reset') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
