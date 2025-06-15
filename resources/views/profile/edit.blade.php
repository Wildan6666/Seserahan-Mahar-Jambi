<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Profile Information --}}
            <div class="bg-white shadow-md hover:shadow-lg transition-shadow border border-gray-200 rounded-2xl p-6 sm:p-8">
                <div class="flex items-center mb-4">
                    <i class="ri-user-3-fill text-primary mr-2 text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Update Profile Information
                    </h3>
                </div>
                
                <div class="max-w-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="bg-white shadow-md hover:shadow-lg transition-shadow border border-gray-200 rounded-2xl p-6 sm:p-8">
                <div class="flex items-center mb-4">
                    <i class="ri-lock-2-fill text-primary mr-2 text-2xl"></i>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Change Password
                    </h3>
                </div>

                <div class="max-w-2xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete User Account --}}
            <div class="bg-red-50 shadow-md hover:shadow-lg transition-shadow border border-red-200 rounded-2xl p-6 sm:p-8">
                <div class="flex items-center mb-4">
                    <i class="ri-delete-bin-2-fill text-red-500 mr-2 text-2xl"></i>
                    <h3 class="text-lg font-semibold text-red-500">
                        Delete Account
                    </h3>
                </div>

                <div class="max-w-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        
        </div>
    </div>
</x-app-layout>
