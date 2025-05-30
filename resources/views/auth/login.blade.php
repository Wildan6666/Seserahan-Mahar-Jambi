<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 px-4">
        <div class="w-full max-w-md bg-gray-800 text-white rounded-2xl shadow-lg p-8 space-y-6">
            <!-- Header -->
            <div class="text-center">
                <h2 class="text-3xl font-bold mb-2">Welcome Back</h2>
                <p class="text-gray-400 text-sm">Please log in to your account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 bg-gray-700 border-gray-600 rounded focus:ring-indigo-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-400">
                        Remember me
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-400 hover:text-indigo-300">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Log in
                    </button>
                </div>
            </form>

            <!-- Footer -->
            <div class="text-center text-xs text-gray-500 mt-6">
                &copy; {{ date('Y') }} Marlina. All rights reserved.
            </div>
        </div>
    </div>
</x-guest-layout>
