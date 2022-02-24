<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            <h1 class="text-base font-semibold">Online Users</h1>
            {{-- @livewire('left-side-nevigation') --}}
        </div>
    </x-slot>

    <div class="flex">
        <div class="flex flex-no-wrap">
            @livewire('admin.dashboard.admin-left-navigation-bar-component')
        </div>

        <div class="w-full h-full">
            @livewire('admin.users.online-users-component')
        </div>
    </div>
</x-app-layout>
