<title>Pengembalian Buku</title>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Status Pengembalian Buku') }}
        </h2>
    </x-slot>

    <div style="padding: 4.5rem 20.5rem; background-color: #25324d;">
        <div style="background-color: #1A202C; border-radius: 0.375rem; overflow: hidden; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);">
            <div style="padding: 1.5rem; background-color: #1A202C; border-bottom: 1px solid #E2E8F0;">
                @include('returnbook.partials.form-edit')
            </div>
        </div>
    </div>
</x-app-layout>
