<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', config('app.name') . " - " . 'online e-commerce, e-professional and e-services platform all in one place')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="canonical" href="{{  Request::url() }}">

        <!-- Primary Meta Tags -->
        <meta name="title" content="@yield('title', config('app.name') . " - " . 'online e-commerce, e-professional and e-services platform all in one place')">
        <meta name="description" content="@yield('description', config('app.name') . " - " . 'is online e-commerce, e-professional and e-services platform all in one place')">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="@yield('title', config('app.name') . " - " . 'online e-commerce, e-professional and e-services platform all in one place')">
        <meta property="og:description" content="@yield('description', config('app.name') . " - " . 'is online e-commerce, e-professional and e-services platform all in one place').">
        <meta property="og:image" content="https://iwill.pk/img/og-image.jpg">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ config('app.url') }}">
        <meta property="twitter:title" content="@yield('title', config('app.name') . " - " . 'online e-commerce, e-professional and e-services platform all in one place')">
        <meta property="twitter:description" content="@yield('description', config('app.name') . " - " . 'is online e-commerce, e-professional and e-services platform all in one place').">
        <meta property="twitter:image" content="https://iwill.pk/img/og-image.jpg">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="/img/favicon/site.webmanifest">
        {{-- <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#ff2d20"> --}}
        <link rel="shortcut icon" href="/img/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#ff2d20">
        <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">

        <!-- itemscope -->
        <meta itemscope itemprop="name" content="@yield('title', config('app.name') . " - " . 'online e-commerce, e-professional and e-services platform all in one place')">
        <meta itemscope itemprop="description" content="@yield('description', config('app.name') . " - " . 'is online e-commerce, e-professional and e-services platform all in one place').">
        <meta itemscope itemprop="image" content="https://iwill.pk/img/og-image.jpg">
        <meta name="apple-mobile-web-app-title" content="Iwill">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- only load trixassest for those route which requred these assets --}}
        {{-- @if (Route::current()->getName() == 'admin.posts.admin-create-new-post'
            OR Route::current()->getName() == 'posts.post-detail-component'
            OR Route::current()->getName() == 'posts.post-edit-component'
        )
            @trixassets
        @endif --}}
        @trixassets

        @livewireStyles

        {{-- only load trixassest for those route which requred these assets --}}
        {{-- @if (Route::current()->getName() == 'admin.posts.admin-create-new-post'
            OR Route::current()->getName() == 'posts.post-edit-component'
        ) --}}
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" defer></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" defer></script>
        {{-- @endif --}}


        <!-- Scripts -->
        <script>
            // // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            // if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            //     document.querySelector('html').classList.add('dark')
            // } else {
            //     document.querySelector('html').classList.remove('dark')
            // }
            // // Whenever the user explicitly chooses light mode
            // localStorage.theme = 'light'

            // // Whenever the user explicitly chooses dark mode
            // localStorage.theme = 'dark'

            // // Whenever the user explicitly chooses to respect the OS preference
            // localStorage.removeItem('theme')

            try {
                  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark')
                  } else {
                    document.documentElement.classList.remove('dark')
                  }
                } catch (_) {}

            // window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            //     if (localStorage.theme === 'system') {
            //         if (e.matches) {
            //             document.documentElement.classList.add('dark');
            //         } else {
            //             document.documentElement.classList.remove('dark');
            //         }
            //     }
            // });

            function updateTheme() {
                if (!('theme' in localStorage)) {
                    localStorage.theme = 'system';
                }

                switch (localStorage.theme) {
                    case 'system':
                        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                            document.documentElement.classList.add('dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                        }
                        document.documentElement.setAttribute('color-theme', 'system');
                        break;

                    case 'dark':
                        document.documentElement.classList.add('dark');
                        document.documentElement.setAttribute('color-theme', 'dark');
                        break;

                    case 'light':
                        document.documentElement.classList.remove('dark');
                        document.documentElement.setAttribute('color-theme', 'light');
                        break;
                }
            }

            updateTheme();

            window.toDarkMode=function(){
                localStorage.theme="dark",
                window.updateTheme()
            },
            window.toLightMode=function(){
                localStorage.theme="light",
                window.updateTheme()
            },
            window.toSystemMode=function(){
                localStorage.theme="system",
                window.updateTheme()
            }

        </script>
        {{-- end of activate the dark theme on system default settings --}}
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="pt-2 pb-2">
                    <div class="">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Start of Page Footer -->
            <footer class="relative pt-12">
                <div class="max-w-screen-2xl mx-auto w-full px-8">
                    <div>
                        <a href="/" class="inline-flex">
                            <img class="w-16 h-16" src="/img/logomark.min.svg" alt="Laravel" loading="lazy">
                        </a>
                    </div>

                    <div class="mt-6 grid grid-cols-12 md:gap-x-8 gap-y-12 sm:mt-12">
                        <div class="col-span-12 lg:col-span-4">
                            <p class="max-w-sm text-xs text-gray-700 sm:text-sm dark:text-gray-500">Avouch Linux is an open source project which is completely built from scratch. It runs fast and stays fast, applications are quick to open and does not slow down with updates. It has its own package manager, installer, much more and the evolution continues.</p>
                            <ul class="mt-6 flex items-center space-x-3">
                                <li>
                                    <a href="https://twitter.com/AvouchOS">
                                        <img id="footer__twitter_dark" class="hidden dark:inline-block w-6 h-6" src="/img/social/twitter.dark.min.svg" alt="Twitter" width="24" height="20" loading="lazy">
                                        <img id="footer__twitter" class="inline-block dark:hidden w-6 h-6" src="/img/social/twitter.min.svg" alt="Twitter" width="24" height="20" loading="lazy">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://github.com/avouchlinux">
                                        <img id="footer__github_dark" class="hidden dark:inline-block w-6 h-6" src="/img/social/github.dark.min.svg" alt="GitHub" width="24" height="24" loading="lazy">
                                        <img id="footer__github" class="inline-block dark:hidden w-6 h-6" src="/img/social/github.min.svg" alt="GitHub" width="24" height="24" loading="lazy">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/qurbanullah">
                                        <img id="footer__youtube_dark" class="hidden dark:inline-block w-6 h-6" src="/img/social/youtube.dark.min.svg" alt="YouTube" width="169" height="150" loading="lazy">
                                        <img id="footer__youtube" class="inline-block dark:hidden w-6 h-6" src="/img/social/youtube.min.svg" alt="YouTube" width="169" height="150" loading="lazy">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/Avouch.Linux/">
                                        <img id="footer__discord_dark" class="hidden dark:inline-block w-6 h-6" src="/img/social/facebook.dark.min.svg" alt="Facebook" width="21" height="24" loading="lazy">
                                        <img id="footer__discord" class="inline-block dark:hidden w-6 h-6" src="/img/social/facebook.min.svg" alt="Facebook" width="21" height="24" loading="lazy">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="text-xs col-span-6 md:col-span-3 lg:col-span-2">
                            <span class="uppercase dark:text-gray-200">Highlights</span>
                            <div class="mt-5">
                                <ul class="space-y-3 text-gray-700 dark:text-gray-500">
                                    <li>
                                        <a href="/packages/home" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Built from scratch</a>
                                    </li>
                                    <li>
                                        <a href="/open-source" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Open Source</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Work Fast</a>
                                    </li>
                                    <li>
                                        <a href="/download-releases" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Live DVD / USB</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-xs col-span-6 md:col-span-3 lg:col-span-2">
                            <span class="uppercase dark:text-gray-200">Resources</span>
                            <div class="mt-5">
                                <ul class="space-y-3 text-gray-700 dark:text-gray-500">
                                    <li>
                                        <a href="/contact-us" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Contact Us</a>
                                    </li>
                                    {{-- <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Laravel News</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Laracon</a>
                                    </li> --}}

                                </ul>
                            </div>
                        </div>
                        {{-- <div class="text-xs col-span-6 md:col-span-3 lg:col-span-2">
                            <span class="uppercase dark:text-gray-200">Partners</span>
                            <div class="mt-5">
                                <ul class="space-y-3 text-gray-700 dark:text-gray-500">
                                    <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Vehikl</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Tighten</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">64 Robots</a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        {{-- <div class="text-xs col-span-6 md:col-span-3 lg:col-span-2">
                            <span class="uppercase dark:text-gray-200">Ecosystem</span>
                            <div class="mt-5">
                                <ul class="space-y-3 text-gray-700 dark:text-gray-500">
                                    <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Cashier</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Dusk</a>
                                    </li>
                                    <li>
                                        <a href="#" class="transition-colors hover:text-gray-600 dark:hover:text-gray-400">Echo</a>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                        </div>
                        <div class="mt-10 border-t pt-6 pb-16 border-gray-200 dark:border-dark-500">
                            <p class="text-xs text-gray-700 dark:text-gray-400">
                                iwill, a project of Qurban Ullah.
                            </p>
                            <p class="mt-6 text-xs text-gray-700 dark:text-gray-400">
                                Privacy Policy | Terms & Conditions
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End of Page Footer -->
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            window.addEventListener('alert', event => {
                         toastr[event.detail.type](event.detail.message,
                         event.detail.title ?? ''), toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                            }
                        });
        </script>
    </body>
</html>
