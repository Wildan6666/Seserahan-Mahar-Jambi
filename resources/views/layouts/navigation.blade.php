<style>
    nav {
        background-color: #f1f5f9; /* Tailwind: slate-100 */
        border-bottom: 1px solid #e2e8f0; /* Tailwind: slate-200 */
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
    }

    nav a {
        transition: all 0.2s ease-in-out;
        border-radius: 0.375rem;
        padding: 0.5rem 0.75rem;
        color: #334155; /* slate-700 */
    }

    nav a:hover {
        background-color: #bbf7d0; /* light teal (more subtle green) */
        color: #16a34a; /* teal-500 (lighter green for hover) */
    }

    nav a.active {
        background-color: #d1fae5; /* lighter teal for active background */
        color: #16a34a; /* teal-500 for active text */
        border-bottom: 2px solid #16a34a; /* teal-500 for border */
    }

    /* Dropdown & mobile toggle button */
    nav button.inline-flex.items-center {
        color: #334155; /* slate-700 */
    }

    nav button.inline-flex.items-center:hover {
        background-color: #e2e8f0; /* slate-200 */
        color: #16a34a; /* teal-500 */
    }

    /* Mobile menu background */
    nav div.sm\:hidden {
        background-color: #f8fafc; /* gray-50 */
    }

    nav .sm\:hidden a:hover {
        background-color: #bbf7d0; /* light teal for hover */
        color: #16a34a; /* teal-500 */
    }
</style>




@php
    function navClass($isActive) {
        return ($isActive ? 'active ' : '') . 
               'inline-flex items-center px-3 py-2 text-sm font-medium border-b-2 border-transparent text-gray-700 hover:text-teal-600 hover:border-teal-300 hover:bg-teal-50 transition duration-150 ease-in-out group';
    }
@endphp



<nav x-data="{ open: false }" class="bg-slate-200 text-gray-700 border-b border-slate-300 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800 select-none">
                    Mahar Jambi
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-8 ms-auto">
                <a href="{{ route('dashboard') }}"
                   class="{{ navClass(request()->routeIs('dashboard')) }}">
                    Dashboard
                </a>

                <a href="{{ route('users.katalog') }}"
                   class="{{ navClass(request()->routeIs('users.katalog')) }}">
                    Product
                </a>

                <a href="{{ route('about') }}"
                   class="{{ navClass(request()->routeIs('about')) }}">
                    About Us
                </a>

                <a href="{{ route('users.cart') }}"
                   class="{{ navClass(request()->routeIs('users.cart')) }}">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-1 text-gray-600 group-hover:text-blue-600 transition"
                             fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 9m13-9l2 9m-5-5h-4" />
                        </svg>
                        Keranjang
                    </div>
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
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

                        <x-dropdown-link :href="route('users.cekpesanan')">
                            {{ __('Pesanan Saya') }}
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
            <x-responsive-nav-link :href="route('users.katalog')" :active="request()->routeIs('users.katalog')">
                Product
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                About Us
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users.cart')" :active="request()->routeIs('users.cart')">
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
