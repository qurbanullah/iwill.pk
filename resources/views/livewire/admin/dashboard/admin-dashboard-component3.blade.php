<div class="flex flex-col w-64 h-screen px-2 py-4 overflow-y-auto border-r border-solid border-slate-600">
    @if(!empty(Auth::user()))
        <div class="flex items-center space-x-2 p-2 mb-4">
            <img class="h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"  alt="{{ Auth::user()->name }}">
            <div>
                <h4 class="font-semibold text-base text-gray-700 dark:text-gray-100 capitalize font-poppins tracking-wide">
                        {{ Auth::user()->name }}
                </h4>
                <span class="text-sm tracking-wide flex items-center space-x-1">
                    <svg class="h-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg><span class="text-gray-600 dark:text-gray-300">Verified</span>
                </span>
            </div>
        </div>
    @endif

    <div class="flex flex-col justify-between mt-6">
        <aside>
            <div>
                <a href="{{ route('admin.dashboard.admin-dashboard') }}" class=" flex justify-between items-center py-3 px-6 text-gray-600 dark:text-gray-100 cursor-pointer hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-100 focus:outline-none">
                    <span class="flex items-center">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <span class="mx-2 font-medium">Dashboard</span>
                    </span>
                </a>
            </div>
            <div x-data="{ open: false }">
                <a @click="open = !open" class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200">
                    <span class="flex items-center">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>

                        <span class="mx-2 font-medium">Users</span>
                    </span>
                    <span>
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </a>

                <div x-show="open" class="bg-gray-100 dark:bg-gray-700">
                    <div>
                        <a class="py-2 pl-14 block text-sm text-gray-600 dark:text-gray-100 hover:bg-blue-500 hover:text-white" href="{{ route('admin.users.all-users') }}">All Users</a>
                    </div>
                    <div>
                        <a class="py-2 pl-14 block text-sm text-gray-600 dark:text-gray-100 hover:bg-blue-500 hover:text-white" href="{{ route('admin.users.online-users') }}">Online Users</a>
                    </div>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class=" flex justify-between items-center py-3 px-6 text-gray-600 dark:text-gray-100 cursor-pointer hover:bg-gray-100 hover:text-gray-700 dark:hover:bg-gray-700 dark:hover:text-gray-100 focus:outline-none">
                    <span class="flex items-center">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>

                        <span class="mx-2 font-medium">Products</span>
                    </span>
                    <span>
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path x-show="! open" d="M9 5L16 12L9 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"></path>
                            <path x-show="open" d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </button>

                <div x-show="open" class="bg-gray-100 dark:bg-gray-700">
                    <div>
                        <a class="py-2 pl-14 block text-sm text-gray-600 dark:text-gray-100 hover:bg-blue-500 hover:text-white" href="{{ route('admin.products.all-products') }}">All Prodects</a>
                        <a class="py-2 pl-14 block text-sm text-gray-600 dark:text-gray-100 hover:bg-blue-500 hover:text-white" href="{{ route('admin.products.products-orders') }}">Prodects Orders</a>
                        <a class="py-2 pl-14 block text-sm text-gray-600 dark:text-gray-100 hover:bg-blue-500 hover:text-white" href="{{ route('admin.products.products-categories') }}">Product Categories</a>
                        <a class="py-2 pl-14 block text-sm text-gray-600 dark:text-gray-100 hover:bg-blue-500 hover:text-white" href="{{ route('admin.products.products-sub-categories') }}">Product Sub Categories</a>
                        <a class="py-2 pl-14 block text-sm text-gray-600 dark:text-gray-100 hover:bg-blue-500 hover:text-white" href="{{ route('admin.products.products-sub-sub-categories') }}">Product Sub Sub Categories</a>
                        <a class="py-2 pl-14 block text-sm text-gray-600 dark:text-gray-100 hover:bg-blue-500 hover:text-white" href="{{ route('admin.products.add-products-categories') }}">Add Products Categories</a>
                    </div>
                </div>
            </div>
        <ul>
            <li>
            <a class="flex items-center px-4 py-2 text-gray-700 bg-gray-100 rounded-md " href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>

                <span class="mx-4 font-medium">Dashboard</span>
            </a>

            </li>

            <li>
            <a class="flex items-center px-4 py-2 mt-5 text-gray-600 rounded-md hover:bg-gray-200" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span class="mx-4 font-medium">Settings</span>
            </a>
            </li>
        </ul>

        </aside>

    </div>
</div>
