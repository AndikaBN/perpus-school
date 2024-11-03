<title>{{config('app.titleEditProfile', 'Laravel')}} - {{$settings->webname}} </title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div style="padding: 3.5rem; background-color: #25324d;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @include('alert.alert-info')
            <div class="p-4 sm:p-8" style="background-color: #1A202C; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8" style="background-color: #1A202C; border-radius: 0.375rem; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
