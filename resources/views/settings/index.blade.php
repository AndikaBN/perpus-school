<title>{{config('app.titleSettings', 'Laravel')}} - {{$settings->webname}} </title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div style="padding: 3.5rem; background-color: #25324d;">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @include('alert.alert-info')
            <div style="background-color: #1A202C; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
                <div class="p-6" style="background-color: #1A202C; border-bottom: 1px solid #4A5568;">
                    @include('settings.partials.form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
