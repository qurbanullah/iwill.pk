<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            <h1 class="text-base font-semibold">Dashboard</h1>
        </div>
    </x-slot>

    <div class="p-4 w-full mx-auto px-4 sm:px-6 lg:px-8 sm:flex flex-wrap">
        <div class="sm:w-2/12 bg-gray-50 dark:bg-gray-800 rounded shadow-lg">
            @livewire('users.user-dashboard-left-navigation-bar')
        </div>

        <div class="sm:w-10/12 bg-gray-100 dark:bg-gray-700">
            @livewire('products.my-products-component')
        </div>
    </div>
</x-app-layout>
