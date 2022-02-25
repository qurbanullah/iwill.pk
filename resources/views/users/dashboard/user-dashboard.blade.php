<x-app-layout>
    <x-slot name="header">
        <div class="max-w-screen-2xl mx-auto px-4">
            <h1 class="text-base font-semibold">Admin Dashboard</h1>
        </div>
    </x-slot>

    <div class="flex">
        <div class="flex flex-no-wrap">
            @livewire('users.dashboard.user-left-navigation-bar-component')
        </div>

        <div class="w-full">
            @livewire('users.dashboard.user-dashboard-component')
        </div>
    </div>
</x-app-layout>
