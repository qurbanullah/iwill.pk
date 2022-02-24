<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            <h1 class="text-base font-semibold">Product Cart</h1>
        </div>
    </x-slot>

    <div class="p-4 w-full mx-auto px-0 sm:flex flex-wrap">
        <div class="w-full bg-gray-100 dark:bg-gray-700">
            @livewire('products.product-checkout-component')
        </div>
    </div>
</x-app-layout>
