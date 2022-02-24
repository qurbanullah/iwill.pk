<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            <h1 class="text-base font-semibold">Product Detail</h1>
        </div>
    </x-slot>

    <div class="p-4 w-full mx-auto px-0 sm:flex flex-wrap">
        <div class="hidden sm:block sm:w-2/12 bg-gray-50 dark:bg-gray-800 rounded shadow-lg">
            @livewire('products.shop-left-navigation-bar')
        </div>

        <div class="w-full sm:w-10/12 bg-gray-100 dark:bg-gray-700">
            @livewire('products.product-detail')
        </div>
    </div>
</x-app-layout>
