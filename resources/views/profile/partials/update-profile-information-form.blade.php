<section class="space-y-6">
    <header>
        <h2 class="text-xl font-semibold text-gray-700">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    {{-- Form untuk kirim ulang email verifikasi --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Form Update Profile --}}
    <form method="post" action="{{ route('profile.update') }}" class="bg-gray-50 border border-gray-200 p-6 rounded-xl shadow-sm space-y-6 max-w-2xl">
        @csrf
        @method('patch')

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-600">
                {{ __('Name') }}
            </label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="mt-2 block w-full rounded-md border border-gray-300 bg-white text-gray-700 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
            @error('name')
                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-600">
                {{ __('Email') }}
            </label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="mt-2 block w-full rounded-md border border-gray-300 bg-white text-gray-700 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
            @error('email')
                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
            @enderror

            {{-- Notifikasi verifikasi email --}}
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 space-y-1">
                    <p class="text-sm text-gray-600">
                        {{ __('Your email address is unverified.') }}
                        <button
                            form="send-verification"
                            class="ml-1 underline text-sm text-indigo-600 hover:text-indigo-800 transition"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Save button + status --}}
        <div class="flex items-center gap-4">
            <button
                type="submit"
                class="px-4 py-2 bg-indigo-100 text-indigo-700 rounded-md hover:bg-indigo-200 transition"
            >
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    class="text-sm text-gray-500"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
