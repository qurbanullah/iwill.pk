<x-slot name="header">
    <div class="mx-auto">
        <ul class="flex">
            <li class="text-base font-semibold"><a href="/">Home</a><span class="pl-2">/</span></li>
            <li class="pl-2 text-base font-semibold"><span>Products</span><span class="pl-2">/</span></li>
            <li class="pl-2 pr-2 text-base font-semibold"><span>Product Categories</span><span class="pl-2">/</span></li>
            <li class="text-base font-semibold">{{ $this->productCategoryName }}</li>
        </ul>

    </div>
</x-slot>

<div class="p-4 w-full mx-auto px-0 sm:flex flex-wrap">
    <div class="hidden sm:block sm:w-2/12 bg-gray-50 dark:bg-gray-800 rounded shadow-lg">
        @livewire('products.shop-left-navigation-bar')
    </div>

    <div class="w-full sm:w-10/12 bg-gray-100 dark:bg-gray-700">
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
                                    @foreach ($searchedData as $item)
                                        <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4 ">
                                            <a
                                                href="{{ route('products.product-detail', $item->SKU) }}"
                                                class="c-card block bg-white dark:bg-gray-700 shadow-md hover:shadow-xl rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">

                                                <div class="relative overflow-hidden">
                                                    <img
                                                        class="w-full object-cover"
                                                        src="{{ env('APP_URL') . '/products-images/' . $item->product_banner_image }}"
                                                        alt="{{ $item->name }}"
                                                    >
                                                </div>
                                                <div class="p-4">
                                                        @if($item->featured == true)
                                                            <span class="inline-block px-2 py-1 leading-none bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase tracking-wide text-xs">Featured</span>
                                                        @else
                                                            <span class="inline-block py-1 leading-none bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase tracking-wide text-xs"></span>
                                                        @endif
                                                    </span>
                                                    <h2 class="mt-2 mb-2  font-bold">{{ ucwords($item->name) }}</h2>
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
                                            </a>
                                        </div>
                                    @endforeach
                                    @else
                                    <div class="p-4">No products meets search query.</div>
                                @endif
                            @else
                            @if ($products->count())
                            @foreach ($products as $item)
                                <div class="w-full sm:w-1/2 md:w-1/2 xl:w-1/4 p-4 ">
                                    <a
                                        href="{{ route('products.product-detail', $item->SKU) }}"
                                        class="c-card block bg-white dark:bg-gray-700 shadow-md hover:shadow-xl rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">

                                        <div class="relative overflow-hidden">
                                            <img
                                                class="w-full object-cover"
                                                src="{{ env('APP_URL') . '/products-images/' . $item->product_banner_image }}"
                                                alt="{{ $item->name }}"
                                            >
                                        </div>
                                        <div class="p-4">
                                                @if($item->featured == true)
                                                    <span class="inline-block px-2 py-1 leading-none bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase tracking-wide text-xs">Featured</span>
                                                @else
                                                    <span class="inline-block py-1 leading-none bg-yellow-200 text-yellow-800 rounded-full font-semibold uppercase tracking-wide text-xs"></span>
                                                @endif
                                            </span>
                                            <h2 class="mt-2 mb-2  font-bold">{{ ucwords($item->name) }}</h2>
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
                                    </a>
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

    </div>
</div>
