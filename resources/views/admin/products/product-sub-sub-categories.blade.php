<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            <h1 class="text-base font-semibold">Products Sub Sub Categories</h1>
            {{-- @livewire('left-side-nevigation') --}}
        </div>
    </x-slot>

    <div class="p-4 w-full mx-auto px-4 sm:px-6 lg:px-8 sm:flex flex-wrap">
        <div class="sm:w-2/12 bg-gray-50 dark:bg-gray-800 rounded shadow-lg">
            @livewire('admin.left-navigation-bar')
        </div>

        <div class="sm:w-10/12 bg-gray-100 dark:bg-gray-700">
            @livewire('admin.products.product-sub-sub-categories-component')
        </div>
    </div>
</x-app-layout>
