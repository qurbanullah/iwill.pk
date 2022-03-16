<!-- Sidebar starts -->
<div>
    <div class="border-r border-solid border-slate-400 dark:border-slate-700">
        <!-- Remove class [ hidden ] and replace [ sm:flex ] with [ flex ] -->
        <div style="min-height: 716px" class="w-64 absolute sm:relative bg-gray-50 dark:bg-gray-800 shadow md:h-full flex-col justify-between hidden sm:flex">
            <div class="px-2 py-2">
                <div class="h-16 w-full flex items-center">
                    @if(!empty(Auth::user()))
                        <div class="flex items-center space-x-2 p-2 mb-4">
                            <img class="h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"  alt="{{ Auth::user()->name }}">
                            <div>
                                <h4 class="font-semibold text-sm text-gray-700 dark:text-gray-100 capitalize font-poppins tracking-wide">
                                        {{ Auth::user()->name }}
                                </h4>
                                <span class="text-sm tracking-wide flex items-center space-x-1">
                                    <svg class="h-3 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg><span class="text-xs text-gray-600 dark:text-gray-300">Verified</span>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
                <ul class="">
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="{{ route('admin.dashboard.admin-dashboard') }}" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                            </svg>
                            <span class="text-sm ml-2">Dashboard</span>
                        </a>
                        <div class="py-1 px-3 bg-gray-500 dark:bg-gray-600 rounded text-gray-100 dark:text-gray-300 flex items-center justify-center text-xs">5</div>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                            </svg>
                            <span class="text-sm ml-2">Products</span>
                        </a>
                        <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">8</div>
                    </li>
                    <li>
                        <div x-data="{ open: false }" class="mb-6">
                            <button @click="open = !open" class="flex justify-between items-center text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer focus:outline-none">
                                <span class="flex items-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                        role="img"
                                        width="1em"
                                        height="1em"
                                        preserveAspectRatio="xMidYMid meet"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 2a5 5 0 1 0 5 5a5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3a3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"/>
                                    </svg>

                                    <span class="mx-2 text-sm font-medium">Users</span>
                                </span>
                                <span>
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                        <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </button>

                            <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-1000"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-1000"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                class="pt-2"
                            >
                                <div class="flex w-full justify-between">
                                    <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.users.all-users') }}">All Users</a>
                                </div>
                                <div class="flex w-full justify-between">
                                    <a class="pt-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.users.online-users') }}">Online Users</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div x-data="{ open: false }" class="mb-6">
                            <button @click="open = (open) ? false : true" class="flex justify-between items-center text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer focus:outline-none">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                    </svg>

                                    <span class="mx-2 text-sm font-medium">Products</span>
                                </span>
                                <span>
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                        <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </button>

                            <div
                                x-show="open"
                                x-transition:enter="transition ease-out duration-1000"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-1000"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90"
                                class="pt-2"
                            >
                                <div class="flex w-full justify-between">
                                    <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.all-products') }}">All Products</a>
                                    <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">8</div>
                                </div>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-orders') }}">Prodects Orders</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-vendors') }}">Product Vendors</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-attributes') }}">Product Attributes</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-categories') }}">Product Categories</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-sub-categories') }}">Product Sub Categories</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-sub-sub-categories') }}">Product Sub Sub Categories</a>
                                <a class="pt-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.add-products-categories') }}">Add Products Categories</a>
                            </div>
                        </div>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                <circle cx="12" cy="12" r="9"></circle>
                            </svg>
                            <span class="text-sm ml-2">Performance</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <polyline points="7 8 3 12 7 16"></polyline>
                                <polyline points="17 8 21 12 17 16"></polyline>
                                <line x1="14" y1="4" x2="10" y2="20"></line>
                            </svg>
                            <span class="text-sm ml-2">Deliverables</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                            </svg>
                            <span class="text-sm ml-2">Invoices</span>
                        </a>
                        <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">25</div>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                <polyline points="4 12 12 16 20 12" />
                                <polyline points="4 16 12 20 20 16" />
                            </svg>
                            <span class="text-sm ml-2">Inventory</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <span class="text-sm ml-2">Settings</span>
                        </a>
                    </li>
                </ul>
                <div class="flex justify-center mt-48 mb-4 w-full">
                    <div class="relative">
                        <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                            <svg
                                class="text-gray-600 h-4 w-4 fill-current"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.1"
                                id="Capa_1"
                                x="0px"
                                y="0px"
                                viewBox="0 0 56.966 56.966"
                                style="enable-background:new 0 0 56.966 56.966;"
                                xml:space="preserve"
                                width="512px"
                                height="512px">
                                <path
                                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </div>
                        <input class="bg-gray-300 dark:bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100 rounded w-full text-sm text-gray-800 dark:text-gray-300 placeholder-gray-700 dark:placeholder-gray-400 pl-10 py-2" type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
            {{-- Start of left nav bar bottom buttons --}}
            <div class="px-8 border-t border-gray-400 dark:border-gray-700">
                <ul class="w-full flex items-center justify-between bg-gray-100 dark:bg-gray-800">
                    <li class="cursor-pointer text-white pt-5 pb-3">
                        <button aria-label="show notifications" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-gray-800 dark:text-gray-200">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                role="img"
                                width="1.2em"
                                height="1.2em"
                                preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M427.68 351.43C402 320 383.87 304 383.87 217.35C383.87 138 343.35 109.73 310 96c-4.43-1.82-8.6-6-9.95-10.55C294.2 65.54 277.8 48 256 48s-38.21 17.55-44 37.47c-1.35 4.6-5.52 8.71-9.95 10.53c-33.39 13.75-73.87 41.92-73.87 121.35C128.13 304 110 320 84.32 351.43C73.68 364.45 83 384 101.61 384h308.88c18.51 0 27.77-19.61 17.19-32.57ZM320 384v16a64 64 0 0 1-128 0v-16"/>
                            </svg>
                        </button>
                    </li>
                    <li class="cursor-pointer text-white pt-5 pb-3">
                        <button aria-label="open chats" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-gray-800 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="currentColor" d="M0 262q0 43 24.5 81T90 405q-2 7-4.5 18t-7 34.5t-3.5 39T85 512q30 0 60.5-16t48.5-32t19-16q55 0 107-21q-6-2-22.5-12T277 405h-64q-18 0-38 20q-28 25-53 36l6-77l-17-15q-68-44-68-107q0-16 6-36q-4-6-5.5-18.5T42 185v-23l1-13Q0 195 0 262zM299 0q-89 0-151.5 52T85 177q0 72 62 118t152 46q1 0 20.5 21.5t51.5 43t62 21.5q7 0 8.5-11t-1.5-26.5t-7-31.5t-7-27l-4-11q41-25 65.5-62.5T512 177q0-73-62.5-125T299 0zm102 284l-28 17l11 32q2 5 5 17t6 19q-22-15-52-45q-23-25-42-25q-70 0-120.5-32.5T130 177q-1-56 48.5-95T299 43t120.5 39t49.5 95q0 63-68 107z"/></svg>
                        </button>
                    </li>
                    <li class="cursor-pointer text-white pt-5 pb-3">
                        <button aria-label="open settings" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-gray-800 dark:text-gray-200">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                role="img"
                                width="1.2em"
                                height="1.2em"
                                preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" d="M13.82 22h-3.64a1 1 0 0 1-.977-.786l-.407-1.884a8.002 8.002 0 0 1-1.535-.887l-1.837.585a1 1 0 0 1-1.17-.453L2.43 15.424a1.006 1.006 0 0 1 .193-1.239l1.425-1.3a8.1 8.1 0 0 1 0-1.772L2.623 9.816a1.006 1.006 0 0 1-.193-1.24l1.82-3.153a1 1 0 0 1 1.17-.453l1.837.585c.244-.18.498-.348.76-.5c.253-.142.513-.271.779-.386l.408-1.882A1 1 0 0 1 10.18 2h3.64a1 1 0 0 1 .976.787l.412 1.883a7.993 7.993 0 0 1 1.534.887l1.838-.585a1 1 0 0 1 1.169.453l1.82 3.153c.232.407.152.922-.193 1.239l-1.425 1.3a8.1 8.1 0 0 1 0 1.772l1.425 1.3c.345.318.425.832.193 1.239l-1.82 3.153a1 1 0 0 1-1.17.453l-1.837-.585a7.98 7.98 0 0 1-1.534.886l-.412 1.879a1 1 0 0 1-.976.786Zm-6.2-5.771l.82.6c.185.136.377.261.577.375c.188.109.38.207.579.296l.933.409l.457 2.091h2.03l.457-2.092l.933-.409c.407-.18.794-.403 1.153-.666l.82-.6l2.042.65l1.015-1.758l-1.583-1.443l.112-1.012c.05-.443.05-.89 0-1.332l-.112-1.012l1.584-1.446l-1.016-1.759l-2.041.65l-.821-.6a6.227 6.227 0 0 0-1.153-.671l-.933-.409L13.016 4h-2.03l-.46 2.092l-.93.408a6.01 6.01 0 0 0-1.153.666l-.821.6l-2.04-.65L4.565 8.88l1.583 1.441l-.112 1.013c-.05.443-.05.89 0 1.332l.112 1.012l-1.583 1.443l1.015 1.758l2.04-.65ZM11.996 16a4 4 0 1 1 0-8a4 4 0 0 1 0 8Zm0-6a2 2 0 1 0 2 2.09v.4V12a2 2 0 0 0-2-2Z"/>
                            </svg>
                        </button>
                    </li>
                    <li class="cursor-pointer text-white pt-5 pb-3">
                        <button aria-label="open logs" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-gray-800 dark:text-gray-200">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                role="img"
                                width="1em"
                                height="1em"
                                preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 1024 1024">
                                <path fill="currentColor" d="M1022.98 509.984L905.475 102.895c-3.84-13.872-16.464-23.472-30.848-23.472H139.283c-14.496 0-27.184 9.744-30.944 23.777L.947 489.552c-1.984 7.504-1.009 15.007 1.999 21.536C1.218 516.88.003 522.912.003 529.264v351.312c0 35.343 28.656 64 64 64h896c35.343 0 64-28.657 64-64V529.264c0-1.712-.369-3.329-.496-5.008c.832-4.592.816-9.44-.527-14.272zm-859.078-366.56l686.369-.001l93.12 321.84H645.055c-1.44 76.816-55.904 129.681-133.057 129.681s-130.624-52.88-132.064-129.68H74.158zm796.097 737.151H64.001V529.263h263.12c27.936 80.432 95.775 129.68 184.879 129.68s157.936-49.248 185.871-129.68h262.128v351.312z"/>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
            {{-- End of left nav bar bottom buttons --}}
        </div>
        <div class="w-64 z-40 absolute bg-gray-50 dark:bg-gray-800 shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out border-r border-solid border-gray-300 dark:border-gray-700" id="mobile-nav">
            <button aria-label="toggle sidebar" id="openSideBar" class="h-10 w-10 bg-gray-50 dark:bg-gray-800 absolute right-0 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800" onclick="sidebarHandler(true)">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                    role="img"
                    width="1.4em"
                    height="1.4em"
                    preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 2h2v20H3zm7 4h7v2h-7zm0 4h7v2h-7z"/>
                    <path fill="currentColor" d="M19 2H6v20h13c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 18H8V4h11v16z"/>
                </svg>
            </button>
            <button aria-label="Close sidebar" id="closeSideBar" class="hidden h-10 w-10 bg-gray-100 dark:bg-gray-800 absolute right-0 mt-16 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white" onclick="sidebarHandler(false)">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                    role="img"
                    width="1em"
                    height="1em"
                    preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 36 36">
                    <path fill="#DD2E44" d="M21.533 18.002L33.768 5.768a2.5 2.5 0 0 0-3.535-3.535L17.998 14.467L5.764 2.233a2.498 2.498 0 0 0-3.535 0a2.498 2.498 0 0 0 0 3.535l12.234 12.234L2.201 30.265a2.498 2.498 0 0 0 1.768 4.267c.64 0 1.28-.244 1.768-.732l12.262-12.263l12.234 12.234a2.493 2.493 0 0 0 1.768.732a2.5 2.5 0 0 0 1.768-4.267L21.533 18.002z"/>
                </svg>
            </button>
            <div class="px-8">
                <div class="h-16 w-full flex items-center">
                    @if(!empty(Auth::user()))
                        <div class="flex items-center space-x-2 p-2 mb-4">
                            <img class="h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"  alt="{{ Auth::user()->name }}">
                            <div>
                                <h4 class="font-semibold text-sm text-gray-700 dark:text-gray-100 capitalize font-poppins tracking-wide">
                                        {{ Auth::user()->name }}
                                </h4>
                                <span class="text-sm tracking-wide flex items-center space-x-1">
                                    <svg class="h-3 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg><span class="text-xs text-gray-600 dark:text-gray-300">Verified</span>
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
                <ul>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                            </svg>
                            <span class="text-sm ml-2">Dashboard</span>
                        </a>
                        <div class="py-1 px-3 bg-gray-600 rounded text-gray-100 dark:text-gray-400  flex items-center justify-center text-xs">5</div>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                            </svg>
                            <span class="text-sm ml-2">Products</span>
                        </a>
                        <div class="py-1 px-3 bg-gray-500 dark:bg-gray-600 rounded text-gray-100 dark:text-gray-300  flex items-center justify-center text-xs">8</div>
                    </li>
                    <li>
                        <div x-data="{ open: false }" class="mb-6">
                            <button @click="open = !open" class="flex justify-between items-center text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer focus:outline-none">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                    </svg>

                                    <span class="mx-2 text-sm font-medium">Users</span>
                                </span>
                                <span>
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                        <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </button>

                            <div x-show="open" class="pt-2">
                                <div class="flex w-full justify-between">
                                    <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.users.all-users') }}">All Users</a>
                                </div>
                                <div class="flex w-full justify-between">
                                    <a class="pt-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.users.online-users') }}">Online Users</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div x-data="{ open: false }" class="mb-6">
                            <button @click="open = !open" class="flex justify-between items-center text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer focus:outline-none">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                                    </svg>

                                    <span class="mx-2 text-sm font-medium">Products</span>
                                </span>
                                <span>
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                                        <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </button>

                            <div x-show="open" class="pt-2">
                                <div class="flex w-full justify-between">
                                    <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.all-products') }}">All Products</a>
                                    <div class="py-1 px-3 bg-gray-500 dark:bg-gray-600 rounded text-gray-100 dark:text-gray-300 flex items-center justify-center text-xs">8</div>
                                </div>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-orders') }}">Prodects Orders</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-vendors') }}">Product Vendors</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-categories') }}">Product Categories</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-sub-categories') }}">Product Sub Categories</a>
                                <a class="py-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.products-sub-sub-categories') }}">Product Sub Sub Categories</a>
                                <a class="pt-2 pl-8 block text-xs text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300" href="{{ route('admin.products.add-products-categories') }}">Add Products Categories</a>
                            </div>
                        </div>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-compass" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <polyline points="8 16 10 10 16 8 14 14 8 16"></polyline>
                                <circle cx="12" cy="12" r="9"></circle>
                            </svg>
                            <span class="text-sm ml-2">Performance</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-code" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <polyline points="7 8 3 12 7 16"></polyline>
                                <polyline points="17 8 21 12 17 16"></polyline>
                                <line x1="14" y1="4" x2="10" y2="20"></line>
                            </svg>
                            <span class="text-sm ml-2">Deliverables</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-puzzle" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"></path>
                                <path d="M4 7h3a1 1 0 0 0 1 -1v-1a2 2 0 0 1 4 0v1a1 1 0 0 0 1 1h3a1 1 0 0 1 1 1v3a1 1 0 0 0 1 1h1a2 2 0 0 1 0 4h-1a1 1 0 0 0 -1 1v3a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-1a2 2 0 0 0 -4 0v1a1 1 0 0 1 -1 1h-3a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1h1a2 2 0 0 0 0 -4h-1a1 1 0 0 1 -1 -1v-3a1 1 0 0 1 1 -1"></path>
                            </svg>
                            <span class="text-sm ml-2">Invoices</span>
                        </a>
                        <div class="py-1 px-3 bg-gray-600 rounded text-gray-300 flex items-center justify-center text-xs">25</div>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center mb-6">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <polyline points="12 4 4 8 12 12 20 8 12 4" />
                                <polyline points="4 12 12 16 20 12" />
                                <polyline points="4 16 12 20 20 16" />
                            </svg>
                            <span class="text-sm ml-2">Inventory</span>
                        </a>
                    </li>
                    <li class="flex w-full justify-between text-gray-700 dark:text-gray-400 hover:text-gray-500 hover:dark:text-gray-300 cursor-pointer items-center">
                        <a href="javascript:void(0)" class="flex items-center focus:outline-none focus:ring-2 focus:ring-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <circle cx="12" cy="12" r="3" />
                            </svg>
                            <span class="text-sm ml-2">Settings</span>
                        </a>
                    </li>
                </ul>
                <div class="flex justify-center mt-48 mb-4 w-full">
                    <div class="relative">
                        <div class="text-gray-300 absolute ml-4 inset-0 m-auto w-4 h-4">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_icons_at_bottom-svg2.svg" alt="Search">
                        </div>
                        <input class="bg-gray-500 dark:bg-gray-600 rounded text-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-100  w-full text-sm placeholder-gray-400 pl-10 py-2" type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
            {{-- Start of left nav bar bottom buttons --}}
            <div class="px-8 border-gray-400 dark:border-gray-700">
                <ul class="w-full flex items-center justify-between bg-gray-100 dark:bg-gray-800">
                    <li class="cursor-pointer text-white pt-5 pb-3">
                        <button aria-label="show notifications" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-gray-800 dark:text-gray-200">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                role="img"
                                width="1.2em"
                                height="1.2em"
                                preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M427.68 351.43C402 320 383.87 304 383.87 217.35C383.87 138 343.35 109.73 310 96c-4.43-1.82-8.6-6-9.95-10.55C294.2 65.54 277.8 48 256 48s-38.21 17.55-44 37.47c-1.35 4.6-5.52 8.71-9.95 10.53c-33.39 13.75-73.87 41.92-73.87 121.35C128.13 304 110 320 84.32 351.43C73.68 364.45 83 384 101.61 384h308.88c18.51 0 27.77-19.61 17.19-32.57ZM320 384v16a64 64 0 0 1-128 0v-16"/>
                            </svg>
                        </button>
                    </li>
                    <li class="cursor-pointer text-white pt-5 pb-3">
                        <button aria-label="open chats" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-gray-800 dark:text-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path fill="currentColor" d="M0 262q0 43 24.5 81T90 405q-2 7-4.5 18t-7 34.5t-3.5 39T85 512q30 0 60.5-16t48.5-32t19-16q55 0 107-21q-6-2-22.5-12T277 405h-64q-18 0-38 20q-28 25-53 36l6-77l-17-15q-68-44-68-107q0-16 6-36q-4-6-5.5-18.5T42 185v-23l1-13Q0 195 0 262zM299 0q-89 0-151.5 52T85 177q0 72 62 118t152 46q1 0 20.5 21.5t51.5 43t62 21.5q7 0 8.5-11t-1.5-26.5t-7-31.5t-7-27l-4-11q41-25 65.5-62.5T512 177q0-73-62.5-125T299 0zm102 284l-28 17l11 32q2 5 5 17t6 19q-22-15-52-45q-23-25-42-25q-70 0-120.5-32.5T130 177q-1-56 48.5-95T299 43t120.5 39t49.5 95q0 63-68 107z"/></svg>
                        </button>
                    </li>
                    <li class="cursor-pointer text-white pt-5 pb-3">
                        <button aria-label="open settings" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-gray-800 dark:text-gray-200">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                role="img"
                                width="1.2em"
                                height="1.2em"
                                preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" d="M13.82 22h-3.64a1 1 0 0 1-.977-.786l-.407-1.884a8.002 8.002 0 0 1-1.535-.887l-1.837.585a1 1 0 0 1-1.17-.453L2.43 15.424a1.006 1.006 0 0 1 .193-1.239l1.425-1.3a8.1 8.1 0 0 1 0-1.772L2.623 9.816a1.006 1.006 0 0 1-.193-1.24l1.82-3.153a1 1 0 0 1 1.17-.453l1.837.585c.244-.18.498-.348.76-.5c.253-.142.513-.271.779-.386l.408-1.882A1 1 0 0 1 10.18 2h3.64a1 1 0 0 1 .976.787l.412 1.883a7.993 7.993 0 0 1 1.534.887l1.838-.585a1 1 0 0 1 1.169.453l1.82 3.153c.232.407.152.922-.193 1.239l-1.425 1.3a8.1 8.1 0 0 1 0 1.772l1.425 1.3c.345.318.425.832.193 1.239l-1.82 3.153a1 1 0 0 1-1.17.453l-1.837-.585a7.98 7.98 0 0 1-1.534.886l-.412 1.879a1 1 0 0 1-.976.786Zm-6.2-5.771l.82.6c.185.136.377.261.577.375c.188.109.38.207.579.296l.933.409l.457 2.091h2.03l.457-2.092l.933-.409c.407-.18.794-.403 1.153-.666l.82-.6l2.042.65l1.015-1.758l-1.583-1.443l.112-1.012c.05-.443.05-.89 0-1.332l-.112-1.012l1.584-1.446l-1.016-1.759l-2.041.65l-.821-.6a6.227 6.227 0 0 0-1.153-.671l-.933-.409L13.016 4h-2.03l-.46 2.092l-.93.408a6.01 6.01 0 0 0-1.153.666l-.821.6l-2.04-.65L4.565 8.88l1.583 1.441l-.112 1.013c-.05.443-.05.89 0 1.332l.112 1.012l-1.583 1.443l1.015 1.758l2.04-.65ZM11.996 16a4 4 0 1 1 0-8a4 4 0 0 1 0 8Zm0-6a2 2 0 1 0 2 2.09v.4V12a2 2 0 0 0-2-2Z"/>
                            </svg>
                        </button>
                    </li>
                    <li class="cursor-pointer text-white pt-5 pb-3">
                        <button aria-label="open logs" class="focus:outline-none focus:ring-2 rounded focus:ring-gray-300 text-gray-800 dark:text-gray-200">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                                role="img"
                                width="1em"
                                height="1em"
                                preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 1024 1024">
                                <path fill="currentColor" d="M1022.98 509.984L905.475 102.895c-3.84-13.872-16.464-23.472-30.848-23.472H139.283c-14.496 0-27.184 9.744-30.944 23.777L.947 489.552c-1.984 7.504-1.009 15.007 1.999 21.536C1.218 516.88.003 522.912.003 529.264v351.312c0 35.343 28.656 64 64 64h896c35.343 0 64-28.657 64-64V529.264c0-1.712-.369-3.329-.496-5.008c.832-4.592.816-9.44-.527-14.272zm-859.078-366.56l686.369-.001l93.12 321.84H645.055c-1.44 76.816-55.904 129.681-133.057 129.681s-130.624-52.88-132.064-129.68H74.158zm796.097 737.151H64.001V529.263h263.12c27.936 80.432 95.775 129.68 184.879 129.68s157.936-49.248 185.871-129.68h262.128v351.312z"/>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
            {{-- End of left nav bar bottom buttons --}}
        </div>
        <script>
            var sideBar = document.getElementById("mobile-nav");
            var openSidebar = document.getElementById("openSideBar");
            var closeSidebar = document.getElementById("closeSideBar");
            sideBar.style.transform = "translateX(-260px)";

            function sidebarHandler(flag) {
                if (flag) {
                    sideBar.style.transform = "translateX(0px)";
                    openSidebar.classList.add("hidden");
                    closeSidebar.classList.remove("hidden");
                } else {
                    sideBar.style.transform = "translateX(-260px)";
                    closeSidebar.classList.add("hidden");
                    openSidebar.classList.remove("hidden");
                }
            }
        </script>
    </div>
</div>
<!-- Sidebar ends -->
