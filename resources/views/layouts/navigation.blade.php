<style>
/* Navbar Light Mode Customizations */
nav.bg-white {
    background-color: #fff;
    border-color: #e5e7eb; /* border-gray-200 */
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

/* Jarak antar menu di desktop */
nav .sm\:space-x-10 > * + * {
    margin-left: 2.5rem; /* 10 spacing */
}

/* Push menu kanan */
nav .ms-auto {
    margin-left: auto !important;
}

/* Hover warna link */
nav a:hover {
    color: #2563eb; /* blue-600 */
}

/* Dropdown button text color */
nav button.inline-flex.items-center {
    color: #374151; /* gray-700 */
}

/* Hover dropdown button */
nav button.inline-flex.items-center:hover {
    color: #1d4ed8; /* blue-700 */
    background-color: #f3f4f6; /* gray-100 */
}

/* Mobile menu background */
nav div.sm\:hidden {
    background-color: #fff;
}

/* Mobile nav links */
nav .sm\:hidden a:hover {
    background-color: #e0e7ff; /* blue-100 */
    color: #1e40af; /* blue-800 */
}



</style>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <!-- Text Logo -->
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-white-800 select-none">
                    Mahar Jambi
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex sm:items-center sm:space-x-8 ms-auto">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link href="{{ route('users.katalog') }}">
                    Product
                </x-nav-link>
                <x-nav-link href="{{ route('about') }}">
                    About Us
                </x-nav-link>
                <x-nav-link href="{{ route('users.cart') }}" class="relative flex items-center">
                    <svg class="w-5 h-5 mr-1 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m13-9l2 9m-5-5h-4" />
                    </svg>
                    Keranjang
                </x-nav-link>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Menu (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('users.katalog') }}">
                Product
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('about') }}">
                About Us
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('users.cart') }}">
                Keranjang
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profile
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
