<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-700 leading-tight">
            {{ __('Profile Settings') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Profile Information --}}
            <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 sm:p-8">
                <h3 class="text-lg font-medium text-gray-700 mb-4 border-b border-gray-200 pb-2">
                    Update Profile Information
                </h3>
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 sm:p-8">
                <h3 class="text-lg font-medium text-gray-700 mb-4 border-b border-gray-200 pb-2">
                    Change Password
                </h3>
                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete User Account --}}
            <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6 sm:p-8">
                <h3 class="text-lg font-medium text-red-500 mb-4 border-b border-gray-200 pb-2">
                    Delete Account
                </h3>
                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
