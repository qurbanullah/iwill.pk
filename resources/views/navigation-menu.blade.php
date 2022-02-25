<div class="sm:py-8">
    <nav x-data="{ open: false }" class="sm:fixed sm:top-0 sm:inset-x-0 sm:h-16 sm:z-40 bg-white dark:bg-gray-900 sm:border-b border-gray-100">
        <div class="md:flex">
            <div class="md:w-3/12 hidden md:flex ">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}">
                            {{-- <x-jet-application-mark class="block h-9 w-auto sm:pl-2" /> --}}
                            <img src="{{ asset('img/iwill-logo.png') }}" class="block h-12 w-auto sm:pl-2" alt="iwill">
                        </a>
                    </div>
                    <!-- Theme switcher -->
                    {{-- <div class="flex-1 flex items-center justify-end">
                        <button id="header__sun" onclick="toSystemMode()" title="Switch to system theme" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="4"></circle>
                                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7"></path>
                            </svg>
                        </button>
                        <button id="header__moon" onclick="toLightMode()" title="Switch to light mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
                            </svg>
                        </button>
                        <button id="header__indeterminate" onclick="toDarkMode()" title="Switch to dark mode" class="relative w-10 h-10 focus:outline-none focus:shadow-outline text-gray-500">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2A10 10 0 0 0 2 12A10 10 0 0 0 12 22A10 10 0 0 0 22 12A10 10 0 0 0 12 2M12 4A8 8 0 0 1 20 12A8 8 0 0 1 12 20V4Z" />
                            </svg>
                        </button>
                    </div> --}}
                    <!-- End Theme switcher -->
                </div>
                {{-- <div class="flex p-3 text-white">
                    @livewire('search-avouch-main')
                </div> --}}
            </div>
            <div class="w-full md:w-8/12 flex items-center content-center justify-center">
                <div class="max-w-3xl mx-auto sm:flex">
                    {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                    @auth
                        <div class="w-full overflow-hidden flex items-center justify-center">
                            <nav class="w-full p-1 sm:h-14 gap-4 md:gap-10 lg:gap-20 overflow-x-auto">
                                <div class="hidden sm:flex sm:gap-8">
                                    @if (Route::has('home'))
                                        <a
                                            href="{{ route('home') }}"
                                            class="w-24 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 1024 1024">
                                                <path
                                                    d="M946.5 505L534.6 93.4a31.93 31.93 0 0 0-45.2 0L77.5 505c-12 12-18.8 28.3-18.8 45.3c0 35.3 28.7 64 64 64h43.4V908c0 17.7 14.3 32 32 32H448V716h112v224h265.9c17.7 0 32-14.3 32-32V614.3h43.4c17 0 33.3-6.7 45.3-18.8c24.9-25 24.9-65.5-.1-90.5z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Home</span>
                                        </a>
                                    @endif
                                    @if (Route::has('products.product-shop'))
                                        <a
                                            href="{{ route('products.product-shop') }}"
                                            class="w-20 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M18.944 11.112C18.507 7.67 15.56 5 12 5C9.244 5 6.85 6.61 5.757 9.149C3.609 9.792 2 11.82 2 14c0 2.657 2.089 4.815 4.708 4.971V19H17.99v-.003L18 19c2.206 0 4-1.794 4-4a4.008 4.008 0 0 0-3.056-3.888zM8 12h3V9h2v3h3l-4 5l-4-5z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Products</span>
                                        </a>
                                    @endif
                                    @if (Route::has('products.product-shop'))
                                        <a
                                            href="{{ route('products.product-shop') }}"
                                            class="w-24 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 32 32">
                                                <path
                                                    d="M17.078 22.004l-1.758-4.13l-2.007 4.753l-7.52-3.29l.175 3.906l9.437 4.374l10.91-5.365l-.15-4.99l-9.087 4.742zM29.454 6.62L18.52 3.382l-3.005 2.67l-3.09-2.358L1.544 8.2l3.796 3.047l-3.43 5.303l10.88 4.756l2.53-5.998l2.256 5.308l11.393-5.942l-3.105-4.71l3.592-3.345zm-14.177 7.96l-9.06-3.83l9.276-4.102L25.1 9.903l-9.823 4.676z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Professionals</span>
                                        </a>
                                    @endif
                                    @if (Route::has('products.product-shop'))
                                        <a
                                            href="{{ route('products.product-shop') }}"
                                            class="w-24 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M18.09 14.696a6.574 6.574 0 0 0-3.381 3.399l4.27.883l-.886-4.282h-.003zM2.475 8.317L0 5.85A11.26 11.26 0 0 1 5.823 0h.006l2.469 2.463a11.224 11.224 0 0 1 4.463-.921C18.967 1.542 24 6.569 24 12.771C24 18.973 18.967 24 12.761 24C6.551 24 1.52 18.976 1.52 12.771c0-1.591.355-3.081.952-4.451l9.143 9.114a11.267 11.267 0 0 1 5.823-5.85l-9.135-9.12h-.008a11.285 11.285 0 0 0-5.823 5.85l.003.003z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Services</span>
                                        </a>
                                    @endif
                                    {{-- @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="w-20 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 256 369">
                                                <path
                                                    d="M65.042 2.174a17.108 17.108 0 0 1 8.762 14.94l.164 150.405H128c29.528-.004 56.151 17.78 67.454 45.059c11.303 27.28 5.06 58.68-15.818 79.562c-20.878 20.881-52.279 27.129-79.56 15.83c-27.28-11.299-45.068-37.92-45.068-67.447l-.066-53.955H19.038v53.955c0 60.178 48.784 108.962 108.962 108.962c60.178 0 108.962-48.784 108.962-108.962c0-60.179-48.784-108.963-108.962-108.963h-16.515a9.519 9.519 0 0 1 0-19.037H128c70.692 0 128 57.307 128 128c0 70.692-57.308 128-128 128c-70.66-.079-127.921-57.34-128-128v-63.474a9.53 9.53 0 0 1 9.519-9.53h45.4l-.153-146.95l-35.728 21.988v83.674a9.519 9.519 0 1 1-19.038 0V41.47a17.184 17.184 0 0 1 8.148-14.574L47.726 2.54a17.108 17.108 0 0 1 17.316-.367zm62.903 184.394H73.99v53.944a53.955 53.955 0 1 0 53.955-53.944zm.055 38.69c8.43 0 15.265 6.834 15.265 15.265c0 8.43-6.834 15.265-15.265 15.265c-8.43 0-15.265-6.835-15.265-15.265c0-8.431 6.834-15.266 15.265-15.266z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Bugs</span>
                                        </a>
                                    @endif --}}
                                    {{-- @if (Route::has('wiki.wiki-home'))
                                        <a
                                            href="{{ route('wiki.wiki-home') }}"
                                            class="w-20 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 32 32">
                                                <path
                                                    d="M16 2a14 14 0 1 0 14 14A14 14 0 0 0 16 2zm12 13h-6a24.26 24.26 0 0 0-2.79-10.55A12 12 0 0 1 28 15zM16 28a5 5 0 0 1-.67 0A21.85 21.85 0 0 1 12 17h8a21.85 21.85 0 0 1-3.3 11a5 5 0 0 1-.7 0zm-4-13a21.85 21.85 0 0 1 3.3-11a6 6 0 0 1 1.34 0A21.85 21.85 0 0 1 20 15zm.76-10.55A24.26 24.26 0 0 0 10 15H4a12 12 0 0 1 8.79-10.55zM4.05 17h6a24.26 24.26 0 0 0 2.75 10.55A12 12 0 0 1 4.05 17zm15.16 10.55A24.26 24.26 0 0 0 22 17h6a12 12 0 0 1-8.79 10.55z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Wiki</span>
                                        </a>
                                    @endif --}}
                                </div>
                            </nav>
                        </div>
                    @else
                        <div class="w-full overflow-hidden flex items-center justify-center">
                            <nav class="w-full p-1 sm:h-14 sm:gap-4 md:gap-10 lg:gap-20 overflow-x-auto">
                                <div class="hidden sm:flex sm:gap-8">
                                    @if (Route::has('home'))
                                        <a
                                            href="{{ route('home') }}"
                                            class="w-24 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 1024 1024">
                                                <path
                                                    d="M946.5 505L534.6 93.4a31.93 31.93 0 0 0-45.2 0L77.5 505c-12 12-18.8 28.3-18.8 45.3c0 35.3 28.7 64 64 64h43.4V908c0 17.7 14.3 32 32 32H448V716h112v224h265.9c17.7 0 32-14.3 32-32V614.3h43.4c17 0 33.3-6.7 45.3-18.8c24.9-25 24.9-65.5-.1-90.5z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Home</span>
                                        </a>
                                    @endif
                                    @if (Route::has('products.product-shop'))
                                        <a
                                            href="{{ route('products.product-shop') }}"
                                            class="w-24 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M18.944 11.112C18.507 7.67 15.56 5 12 5C9.244 5 6.85 6.61 5.757 9.149C3.609 9.792 2 11.82 2 14c0 2.657 2.089 4.815 4.708 4.971V19H17.99v-.003L18 19c2.206 0 4-1.794 4-4a4.008 4.008 0 0 0-3.056-3.888zM8 12h3V9h2v3h3l-4 5l-4-5z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Products</span>
                                        </a>
                                    @endif
                                    @if (Route::has('products.product-shop'))
                                        <a
                                            href="{{ route('products.product-shop') }}"
                                            class="w-24 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 32 32">
                                                <path
                                                    d="M17.078 22.004l-1.758-4.13l-2.007 4.753l-7.52-3.29l.175 3.906l9.437 4.374l10.91-5.365l-.15-4.99l-9.087 4.742zM29.454 6.62L18.52 3.382l-3.005 2.67l-3.09-2.358L1.544 8.2l3.796 3.047l-3.43 5.303l10.88 4.756l2.53-5.998l2.256 5.308l11.393-5.942l-3.105-4.71l3.592-3.345zm-14.177 7.96l-9.06-3.83l9.276-4.102L25.1 9.903l-9.823 4.676z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Professionals</span>
                                        </a>
                                    @endif
                                    @if (Route::has('products.product-shop'))
                                        <a
                                            href="{{ route('products.product-shop') }}"
                                            class="w-24 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M18.09 14.696a6.574 6.574 0 0 0-3.381 3.399l4.27.883l-.886-4.282h-.003zM2.475 8.317L0 5.85A11.26 11.26 0 0 1 5.823 0h.006l2.469 2.463a11.224 11.224 0 0 1 4.463-.921C18.967 1.542 24 6.569 24 12.771C24 18.973 18.967 24 12.761 24C6.551 24 1.52 18.976 1.52 12.771c0-1.591.355-3.081.952-4.451l9.143 9.114a11.267 11.267 0 0 1 5.823-5.85l-9.135-9.12h-.008a11.285 11.285 0 0 0-5.823 5.85l.003.003z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Services</span>
                                        </a>
                                    @endif
                                    {{-- @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="w-20 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 256 369">
                                                <path
                                                    d="M65.042 2.174a17.108 17.108 0 0 1 8.762 14.94l.164 150.405H128c29.528-.004 56.151 17.78 67.454 45.059c11.303 27.28 5.06 58.68-15.818 79.562c-20.878 20.881-52.279 27.129-79.56 15.83c-27.28-11.299-45.068-37.92-45.068-67.447l-.066-53.955H19.038v53.955c0 60.178 48.784 108.962 108.962 108.962c60.178 0 108.962-48.784 108.962-108.962c0-60.179-48.784-108.963-108.962-108.963h-16.515a9.519 9.519 0 0 1 0-19.037H128c70.692 0 128 57.307 128 128c0 70.692-57.308 128-128 128c-70.66-.079-127.921-57.34-128-128v-63.474a9.53 9.53 0 0 1 9.519-9.53h45.4l-.153-146.95l-35.728 21.988v83.674a9.519 9.519 0 1 1-19.038 0V41.47a17.184 17.184 0 0 1 8.148-14.574L47.726 2.54a17.108 17.108 0 0 1 17.316-.367zm62.903 184.394H73.99v53.944a53.955 53.955 0 1 0 53.955-53.944zm.055 38.69c8.43 0 15.265 6.834 15.265 15.265c0 8.43-6.834 15.265-15.265 15.265c-8.43 0-15.265-6.835-15.265-15.265c0-8.431 6.834-15.266 15.265-15.266z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Bugs</span>
                                        </a>
                                    @endif --}}
                                    {{-- @if (Route::has('wiki.wiki-home'))
                                        <a
                                            href="{{ route('wiki.wiki-home') }}"
                                            class="w-20 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 32 32">
                                                <path
                                                    d="M16 2a14 14 0 1 0 14 14A14 14 0 0 0 16 2zm12 13h-6a24.26 24.26 0 0 0-2.79-10.55A12 12 0 0 1 28 15zM16 28a5 5 0 0 1-.67 0A21.85 21.85 0 0 1 12 17h8a21.85 21.85 0 0 1-3.3 11a5 5 0 0 1-.7 0zm-4-13a21.85 21.85 0 0 1 3.3-11a6 6 0 0 1 1.34 0A21.85 21.85 0 0 1 20 15zm.76-10.55A24.26 24.26 0 0 0 10 15H4a12 12 0 0 1 8.79-10.55zM4.05 17h6a24.26 24.26 0 0 0 2.75 10.55A12 12 0 0 1 4.05 17zm15.16 10.55A24.26 24.26 0 0 0 22 17h6a12 12 0 0 1-8.79 10.55z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-sm capitalize">Wiki</span>
                                        </a>
                                    @endif --}}
                                </div>
                            </nav>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="md:w-3/12 flex items-center justify-end">

                {{-- mini cart and wishlist components --}}
                <div class="hidden md:flex mt-2">
                    <div class="hidden sm:flex p-1 ">
                        @livewire('products.product-wishlist-count-component')
                        @livewire('products.product-cart-count-component')
                    </div>
                </div>
                {{-- end mini cart and wishlist components --}}

                <div class="hidden md:flex items-center justify-end">
                    <div class="hidden sm:flex items-center justify-end">
                        @if(empty(Auth::user()))
                            <div class="overflow-hidden hidden md:flex items-center justify-center">
                                <nav class="hidden sm:flex w-full h-14 gap-2 overflow-x-auto">
                                    @if (Route::has('login'))
                                        <a
                                            href="{{ route('login') }}"
                                            class="w-16 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 1024 1024"><defs/>
                                                <path
                                                    d="M521.7 82c-152.5-.4-286.7 78.5-363.4 197.7c-3.4 5.3.4 12.3 6.7 12.3h70.3c4.8 0 9.3-2.1 12.3-5.8c7-8.5 14.5-16.7 22.4-24.5c32.6-32.5 70.5-58.1 112.7-75.9c43.6-18.4 90-27.8 137.9-27.8c47.9 0 94.3 9.3 137.9 27.8c42.2 17.8 80.1 43.4 112.7 75.9c32.6 32.5 58.1 70.4 76 112.5C865.7 417.8 875 464.1 875 512c0 47.9-9.4 94.2-27.8 137.8c-17.8 42.1-43.4 80-76 112.5s-70.5 58.1-112.7 75.9A352.8 352.8 0 0 1 520.6 866c-47.9 0-94.3-9.4-137.9-27.8A353.84 353.84 0 0 1 270 762.3c-7.9-7.9-15.3-16.1-22.4-24.5c-3-3.7-7.6-5.8-12.3-5.8H165c-6.3 0-10.2 7-6.7 12.3C234.9 863.2 368.5 942 520.6 942c236.2 0 428-190.1 430.4-425.6C953.4 277.1 761.3 82.6 521.7 82zM395.02 624v-76h-314c-4.4 0-8-3.6-8-8v-56c0-4.4 3.6-8 8-8h314v-76c0-6.7 7.8-10.5 13-6.3l141.9 112a8 8 0 0 1 0 12.6l-141.9 112c-5.2 4.1-13 .4-13-6.3z"
                                                    fill="#626262"/>
                                            </svg>

                                            <span class="text-xs">Login</span>
                                        </a>
                                    @endif
                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="w-16 flex flex-col flex-grow items-center justify-center
                                            overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
                                            ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">

                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                focusable="false"
                                                width="2em"
                                                height="2em"
                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 24 24">
                                                <g class="icon-tabler" fill="none" stroke="#626262" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="9"/>
                                                    <path d="M9 16V8h4a2 2 0 0 1 0 4H9m3 0l3 4"/>
                                                </g>
                                            </svg>

                                            <span class="text-xs">Register</span>
                                        </a>
                                    @endif
                                </nav>
                            </div>
                        @endif
                        <!-- Teams Dropdown -->
                        @auth
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="">
                                    <x-jet-dropdown width="60">
                                        <x-slot name="trigger">
                                            <span class="inline-flex rounded-md">
                                                <button class="mt-1 flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                                    <svg
                                                        class="h-10 w-10"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        aria-hidden="true"
                                                        focusable="false"
                                                        width="2.5em"
                                                        height="2.5em"
                                                        style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                        preserveAspectRatio="xMidYMid meet"
                                                        viewBox="0 0 20 20">
                                                        <path d="M10 1.6a8.4 8.4 0 1 0 0 16.8a8.4 8.4 0 0 0 0-16.8zm5 9.4h-4v4H9v-4H5V9h4V5h2v4h4v2z" fill="#626262"/></svg>
                                                </button>
                                            </span>
                                        </x-slot>

                                        <x-slot name="content">
                                            <div class="w-60">
                                                <!-- Team Management -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Manage Team') }}
                                                </div>

                                                <!-- Team Settings -->
                                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                    {{ __('Team Settings') }}
                                                </x-jet-dropdown-link>

                                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                        {{ __('Create New Team') }}
                                                    </x-jet-dropdown-link>
                                                @endcan

                                                <div class="border-t border-gray-100"></div>

                                                <!-- Team Switcher -->
                                                <div class="block px-4 py-2 text-xs text-gray-400">
                                                    {{ __('Switch Teams') }}
                                                </div>

                                                @foreach (Auth::user()->allTeams() as $team)
                                                    <x-jet-switchable-team :team="$team" />
                                                @endforeach
                                            </div>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>
                            @endif
                        @endauth

                        <!-- Settings Dropdown -->
                        <div class="pl-3 pr-3 flex items-center justify-center">
                            <x-jet-dropdown width="48">
                                <x-slot name="trigger">
                                    @if(!empty(Auth::user()))
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                    {{ Auth::user()->name }}

                                                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    @endif
                                </x-slot>

                                <x-slot name="content">
                                    <!-- Dashboard -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Dashboard') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('users.dashboard.user-dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </x-jet-dropdown-link>

                                    @if(!empty(Auth::user()->role))
                                        @if (Auth::user()->role === 'admin')
                                            <x-jet-dropdown-link href="{{ route('admin.dashboard.admin-dashboard') }}">
                                                {{ __('Admin Dashboard') }}
                                            </x-jet-dropdown-link>
                                        @endif
                                    @endif

                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-1 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden">
            <div>
                <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('products.product-shop') }}" :active="request()->routeIs('downloads.download-releases')">
                    {{ __('Products') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('products.product-shop') }}" :active="request()->routeIs('packages.package-home')">
                    {{ __('Professionals') }}
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('products.product-shop') }}" :active="request()->routeIs('posts.post-home')">
                    {{ __('Services') }}
                </x-jet-responsive-nav-link>
                @auth
                    <x-jet-responsive-nav-link href="{{ route('users.dashboard.user-dashboard') }}" :active="request()->routeIs('users.dashboard.user-dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-responsive-nav-link>
                @endauth

                @if(!empty(Auth::user()->role))
                    @if (Auth::user()->role === 'admin')
                        <x-jet-dropdown-link href="{{ route('admin.dashboard.admin-dashboard') }}">
                            {{ __('Admin Dashboard') }}
                        </x-jet-dropdown-link>
                    @endif
                @endif
                @auth
                    @if (Route::has('logout'))
                        <x-jet-responsive-nav-link  href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    {{ __('Logout') }}
                        </x-jet-responsive-nav-link>
                    @endif
                @else
                    @if (Route::has('login'))
                        <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-jet-responsive-nav-link>
                    @endif
                    @if (Route::has('register'))
                        <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-jet-responsive-nav-link>
                    @endif
                @endauth
            </div>
            <!-- Responsive Settings Options -->
            <div class="border-t border-gray-200">
                <div class="flex items-center">
                    @if(!empty(Auth::user()))
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="flex-shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </div>
                        @endif
                    @endif
                        <div>
                            @if(!empty(Auth::user()))
                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            @endif
                        </div>
                </div>


                <div class="">
                    @if(!empty(Auth::user()))
                        <!-- Account Management -->
                        {{-- <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-jet-responsive-nav-link> --}}
                        {{-- <x-jet-responsive-nav-link href="{{ route('posts.post-create') }}" :active="request()->routeIs('posts.post-create')">
                            {{ __('New Post') }}
                        </x-jet-responsive-nav-link> --}}
                        {{-- <x-jet-responsive-nav-link href="{{ route('posts.my-posts') }}" :active="request()->routeIs('posts.my-posts')">
                            {{ __('My Psts') }}
                        </x-jet-responsive-nav-link> --}}

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                {{ __('API Tokens') }}
                            </x-jet-responsive-nav-link>
                        @endif


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-responsive-nav-link>
                        </form>
                    @endif
                    <!-- Team Management -->
                    @if(!empty(Auth::user()))
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="border-t border-gray-200"></div>

                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                {{ __('Team Settings') }}
                            </x-jet-responsive-nav-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                    {{ __('Create New Team') }}
                                </x-jet-responsive-nav-link>
                            @endcan

                            <div class="border-t border-gray-200"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </nav>
</div>
