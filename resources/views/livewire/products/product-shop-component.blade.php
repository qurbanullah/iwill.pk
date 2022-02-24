<div class="content-center">
    <div class="">
        <div class="">
            <div class="h-16 p-3 bg-gray-200 dark:bg-gray-800 flex flex-row mb-1 sm:mb-0">
                <div class="block">
                    <select wire:model="recordsPerPage"
                    class="h-full border block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500">
                        <option value="24">24 per page</option>
                        <option value="32">32 per page</option>
                        <option value="48">48 per page</option>
                        <option value="64">64 per page</option>
                        <option value="84">84 per page</option>
                        <option value="96">96 per page</option>
                    </select>
                </div>
                <div class="block ml-2">
                    <select wire:model="sorting"
                        class="h-full border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500">
                        <option value="default">Deafault Sorting</option>
                        <option value="latest">Sort by latest products</option>
                        <option value="price_ascending">Sort by price low to high</option>
                        <option value="price_decending">Sort by price high to low</option>
                    </select>
                </div>
                <div class="flex max-w-md ml-2 text-gray-600">
                    <input
                        type="text"
                        class="h-full border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500 dark:placeholder-gray-300"
                        placeholder="Search"
                        wire:model.debounce.300ms="query"
                        wire:keydown.escape="resetVariables"
                        wire:keydown.tab="resetVariables"
                        wire:keydown.ArrowUp="decrementHighlight"
                        wire:keydown.ArrowDown="incrementHighlight"
                        wire:keydown.enter="selectContact"
                    />
                    <button type="submit" class="-mx-6">
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
                    </button>
                </div>
            </div>
            <div class="container mx-auto">
                <div class="flex flex-wrap -mx-4 p-4">
                    @if (!empty($query))
                        @if ($searchedData->count())
                            @php
                                $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach ($searchedData as $item)
                                <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4 ">
                                    <div>
                                        <a
                                            href="{{ route('products.product-detail', Crypt::encrypt($item->id)) }}"
                                            class="c-card block bg-white dark:bg-gray-700 shadow-md hover:shadow-xl rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">

                                            <div class="relative overflow-hidden">
                                                <img
                                                    class="w-full object-cover"
                                                    src="{{ env('APP_URL') . '/products-images/' . $item->product_banner_image }}"
                                                    alt="{{ $item->name }}"
                                                >
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <div class="grid grid-cols-2">
                                            <div class="">
                                                @if($item->featured == true)
                                                    <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase text-xs">Featured</span>
                                                @else
                                                    <span class="py-1 bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase text-xs"></span>
                                                @endif
                                            </div>
                                            <div id="product-whish" class="flex justify-end">
                                                <div>
                                                    @if($witems->contains($item->id))
                                                    <a
                                                        wire:click.prevent="RemoveProductFromWishList({{ $item->id }})"
                                                        class="w-full text-center text-base font-semibold bg-gray-100 dark:bg-gray-600 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                                        href="#">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            aria-hidden="true"
                                                            focusable="false"
                                                            width="2em"
                                                            height="2em"
                                                            style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39c-10 6.1-19.5 12.8-28.5 20.1c-9-7.3-18.5-14-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9z" fill="#ff7007"/>
                                                        </svg>
                                                    </a>
                                                    @else
                                                        <a
                                                            wire:click.prevent="AddProductToWishList('{{ $item->id }}', '{{ $item->name }}', '{{ $item->regular_price }}')"
                                                            class="w-full text-center text-base font-semibold bg-gray-100 dark:bg-gray-600 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                                            href="#">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                width="2em"
                                                                height="2em"
                                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39c-10 6.1-19.5 12.8-28.5 20.1c-9-7.3-18.5-14-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9z" fill="#626262"/>
                                                            </svg>
                                                        </a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <a
                                            href="{{ route('products.product-detail', Crypt::encrypt($item->id)) }}"
                                            class="c-card block hover:text-yellow-500 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                        >
                                            <h2 class="mt-2 mb-2 font-bold">{{ ucwords($item->name) }}</h2>
                                        </a>
                                        <p class="text-sm">{!! Str::limit($item->short_description, $limit = 70, $end = '...') !!}</p>
                                        <div class="mt-3 flex items-center">
                                            <span class="text-sm font-semibold">Rs.</span>&nbsp;
                                            <span class="font-bold text-xl">{{ $item->regular_price }}</span>&nbsp;
                                        </div>
                                    </div>
                                    <div class="p-4 flex items-center text-sm text-gray-600 dark:text-gray-200">
                                        <svg viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-current text-yellow-500">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-current text-yellow-500">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-current text-yellow-500">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-current text-gray-400">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">34 Users rated</span>
                                    </div>
                                    <div class="pt-2 w-full flex justify-center">
                                        <a href="#"
                                            wire:click.prevent="AddProductToCart('{{ $item->id }}', '{{ $item->name }}', '{{ $item->regular_price }}')"
                                            class="p-2 w-full text-center text-base font-semibold bg-gray-100 dark:bg-gray-600 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                            Add To Cart
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-4">No products meets search criteria</div>
                        @endif
                    @else
                        @if ($products->count())
                            @php
                                $witems = Cart::instance('wishlist')->content()->pluck('id');
                            @endphp
                            @foreach ($products as $item)
                                <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4 ">
                                    <div class="relative">
                                        <div class="relative w-full">
                                            <div>
                                                <a
                                                    href="{{ route('products.product-detail', Crypt::encrypt($item->id)) }}"
                                                    class="c-card block bg-white dark:bg-gray-700 shadow-md hover:shadow-xl rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">

                                                    <div class="relative overflow-hidden">
                                                        <img
                                                            class="w-full object-cover"
                                                            src="{{ env('APP_URL') . '/products-images/' . $item->product_banner_image }}"
                                                            alt="{{ $item->name }}"
                                                        >
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="absolute top-0 right-0">
                                                <div>
                                                    @if($witems->contains($item->id))
                                                    <a
                                                        wire:click.prevent="RemoveProductFromWishList({{ $item->id }})"
                                                        class="w-full text-center text-base font-semibold bg-gray-100 dark:bg-gray-600 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                                        href="#">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            aria-hidden="true"
                                                            focusable="false"
                                                            width="2em"
                                                            height="2em"
                                                            style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                            preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39c-10 6.1-19.5 12.8-28.5 20.1c-9-7.3-18.5-14-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9z" fill="#ff7007"/>
                                                        </svg>
                                                    </a>
                                                    @else
                                                        <a
                                                            wire:click.prevent="AddProductToWishList('{{ $item->id }}', '{{ $item->name }}', '{{ $item->regular_price }}')"
                                                            class="w-full text-center text-base font-semibold bg-gray-100 dark:bg-gray-600 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                                            href="#">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                width="2em"
                                                                height="2em"
                                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path d="M923 283.6a260.04 260.04 0 0 0-56.9-82.8a264.4 264.4 0 0 0-84-55.5A265.34 265.34 0 0 0 679.7 125c-49.3 0-97.4 13.5-139.2 39c-10 6.1-19.5 12.8-28.5 20.1c-9-7.3-18.5-14-28.5-20.1c-41.8-25.5-89.9-39-139.2-39c-35.5 0-69.9 6.8-102.4 20.3c-31.4 13-59.7 31.7-84 55.5a258.44 258.44 0 0 0-56.9 82.8c-13.9 32.3-21 66.6-21 101.9c0 33.3 6.8 68 20.3 103.3c11.3 29.5 27.5 60.1 48.2 91c32.8 48.9 77.9 99.9 133.9 151.6c92.8 85.7 184.7 144.9 188.6 147.3l23.7 15.2c10.5 6.7 24 6.7 34.5 0l23.7-15.2c3.9-2.5 95.7-61.6 188.6-147.3c56-51.7 101.1-102.7 133.9-151.6c20.7-30.9 37-61.5 48.2-91c13.5-35.3 20.3-70 20.3-103.3c.1-35.3-7-69.6-20.9-101.9z" fill="#626262"/>
                                                            </svg>
                                                        </a>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="absolute top-0 left-0">
                                                @if($item->featured == true)
                                                    <span class="px-2 py-1 bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase text-xs">Featured</span>
                                                @else
                                                    <span class="py-1 bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase text-xs"></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-2">

                                        <a
                                            href="{{ route('products.product-detail', Crypt::encrypt($item->id)) }}"
                                            class="c-card block hover:text-yellow-500 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                        >
                                            <h2 class="mt-2 mb-2 font-bold">{{ ucwords($item->name) }}</h2>
                                        </a>
                                        <p class="text-sm">{!! Str::limit($item->short_description, $limit = 70, $end = '...') !!}</p>
                                        <div class="mt-3 flex items-center">
                                            <span class="text-sm font-semibold">Rs.</span>&nbsp;
                                            <span class="font-bold text-xl">{{ $item->regular_price }}</span>&nbsp;
                                        </div>
                                    </div>
                                    <div class="pt-2 flex items-center text-sm text-gray-600 dark:text-gray-200">
                                        <svg viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 fill-current text-yellow-500">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-current text-yellow-500">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-current text-yellow-500">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-current text-yellow-500">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                            class="h-4 w-4 fill-current text-gray-400">
                                            <path
                                                d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                            </path>
                                        </svg>
                                        <span class="ml-2">34 Users rated</span>
                                    </div>
                                    <div class="pt-2 w-full flex justify-center">
                                        <a href="#"
                                            wire:click.prevent="AddProductToCart('{{ $item->id }}', '{{ $item->name }}', '{{ $item->regular_price }}')"
                                            class="p-2 w-full text-center text-base font-semibold bg-gray-100 dark:bg-gray-600 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                            Add To Cart
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="p-4">No products are available at present.</div>
                        @endif
                    @endif
                </div>
                <div class="p-4">
                    @if (!empty($query))
                        {{ $searchedData->links() }}
                    @else
                        {{ $products->links() }}
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>
