<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            <h1 class="text-base font-semibold">Home</h1>
            {{-- @livewire('left-side-nevigation') --}}
        </div>
    </x-slot>
    {{-- main contents --}}
    <div class="py-2">

        {{-- livewire banner componenet --}}
        <div class="">
            <div class="mx-auto">
                @include('home.home-banner-products')
            </div>
            <div class="mx-auto">
                @include('home.home-banner-services')
            </div>
            <div class="mx-auto">
                @include('home.home-banner-professionals')
            </div>
            <div class="mx-auto">
                @include('home.home-banner-featured-offers')
            </div>
            <div class="mx-auto">
                @include('home.home-banner-most-viewed')
            </div>
            <div class="mx-auto">
                @include('home.home-banner-trending')
            </div>
            <div class="mx-auto">
                @include('home.home-banner-best-offers')
            </div>
        </div>

        {{-- livewire about-us componenet --}}
        <div class="">
            <div>
                {{-- @livewire('home') --}}
            </div>
        </div>
    </div>
</x-app-layout>
