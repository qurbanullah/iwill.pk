<div class="mx-auto sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-800">
    <div style="min-height: 770px" class="container mx-auto sm:relative md:h-full flex-col justify-between">
        <div class="container mx-auto">
            <div class="py-2">
                <div>
                    <h2 class="text-xl font-semibold leading-tight">Product Categories</h2>
                </div>
                <div class="w-full my-4 sm:flex sm:flex-row ">
                    <div class="w-full h-10 flex">
                        <div class="">
                            <select wire:model="recordsToDisplay"
                            class="bg-gray-200 dark:bg-gray-700 text-sm focus:outline-none focus:ring-1 focus:ring-gray-100 rounded text-gray-800 dark:text-gray-300 placeholder-gray-700 dark:placeholder-gray-400">
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                                <option>200</option>
                            </select>
                        </div>
                        <div class="px-1">
                            <select wire:model="isActive"
                                class="bg-gray-200 dark:bg-gray-700 text-sm focus:outline-none focus:ring-1 focus:ring-gray-100 rounded text-gray-800 dark:text-gray-300 placeholder-gray-700 dark:placeholder-gray-400">
                                <option disabled>Active/Inactive</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <div class="flex justify-center">
                            <div class="relative">
                                <div class="text-gray-200 absolute ml-4 inset-0 m-auto w-4 h-4">
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
                                <input
                                    class="bg-gray-200 dark:bg-gray-700 focus:outline-none focus:ring-1 focus:ring-gray-100 rounded w-full text-sm text-gray-800 dark:text-gray-300 placeholder-gray-700 dark:placeholder-gray-400 pl-10"
                                    type="text"
                                    placeholder="Search"
                                    placeholder="Search"
                                    wire:model.debounce.300ms="query"
                                    wire:keydown.escape="resetVariables"
                                    wire:keydown.tab="resetVariables"
                                    wire:keydown.ArrowUp="decrementHighlight"
                                    wire:keydown.ArrowDown="incrementHighlight"
                                    wire:keydown.enter="selectContact"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="w-full py-2 sm:py-0">
                        <div class="flex justify-end">
                            <x-jet-button wire:click="createShowModal">
                                {{ __('Create') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
                {{-- The data table --}}
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden border border-solid border-slate-300 dark:border-slate-600 shadow rounded-lg">

                                <table class="min-w-full divide-y divide-slate-300 dark:divide-slate-600 dark:bg-gray-800 dark:text-gray-100 overflow-auto">
                                    <thead>
                                        <tr class="dark:bg-gray-800">
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Slug</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Regular Price</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Sale Price</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">SKU</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Stock Status</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Featured</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Quantity</th>
                                            {{-- <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Product Banner Image</th> --}}
                                            {{-- <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Procuct Images</th> --}}
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Is Active</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Vendor</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Product Vendor</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Product Category</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Product Sub Category</th>
                                            <th class="px-6 py-3 text-left text-xs leading-4 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-300 dark:divide-slate-600">
                                    @if (!empty($query))
                                        @if ($productsSearched->count())
                                            @foreach ($productsSearched as $item)
                                                <tr>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        <a
                                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="#">
                                                            {{ $item->product_slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_regular_price }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_sale_price }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_SKU }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_stock_status }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_featured }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_quantity }}
                                                    </td>
                                                    {{-- <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_banner_image }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_images }}
                                                    </td> --}}
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_is_active }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_user_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_vendor_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_category_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_sub_category_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-right text-xs">
                                                        <button>
                                                            <button wire:click="updateShowModal({{ $item->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                width="1.5em"
                                                                height="1.5em"
                                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 576 512">
                                                                <path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9L216.2 301.8l-7.3 65.3l65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1l30.9-30.9c4-4.2 4-10.8-.1-14.9z" fill="#2ecc71 "/>
                                                            </svg>
                                                        </button>
                                                        <button class="px-2" wire:click="deleteShowModal({{ $item->id }})">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true"
                                                                role="img"
                                                                width="1.2em"
                                                                height="1.2em"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 64 64">
                                                                <path fill="#ec1c24" d="M50.592 2.291L32 20.884C25.803 14.689 19.604 8.488 13.406 2.291c-7.17-7.17-18.284 3.948-11.12 11.12c6.199 6.193 12.4 12.395 18.592 18.592A32589.37 32589.37 0 0 1 2.286 50.595c-7.164 7.168 3.951 18.283 11.12 11.12c6.197-6.199 12.396-12.399 18.593-18.594l18.592 18.594c7.17 7.168 18.287-3.951 11.12-11.12c-6.199-6.199-12.396-12.396-18.597-18.594c6.2-6.199 12.397-12.398 18.597-18.596c7.168-7.166-3.949-18.284-11.12-11.11"/>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="px-6 py-4 text-xs whitespace-no-wrap" colspan="4">No Results Found</td>
                                            </tr>
                                        @endif
                                    @else
                                        @if ($products->count())
                                            @foreach ($products as $item)
                                                <tr>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        <a
                                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="#">
                                                            {{ $item->product_slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_regular_price }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_sale_price }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_SKU }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_stock_status }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_featured }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_quantity }}
                                                    </td>
                                                    {{-- <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_banner_image }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_images }}
                                                    </td> --}}
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_is_active }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_user_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_vendor_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_category_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-xs whitespace-no-wrap">
                                                        {{ $item->product_sub_category_name }}
                                                    </td>
                                                    <td class="px-6 py-2 text-right text-xs">
                                                        <button>
                                                            <button wire:click="updateShowModal({{ $item->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                width="1.5em"
                                                                height="1.5em"
                                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 576 512">
                                                                <path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9L216.2 301.8l-7.3 65.3l65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1l30.9-30.9c4-4.2 4-10.8-.1-14.9z" fill="#2ecc71 "/>
                                                            </svg>
                                                        </button>
                                                        <button class="px-2" wire:click="deleteShowModal({{ $item->id }})">
                                                            <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                aria-hidden="true"
                                                                role="img"
                                                                width="1.2em"
                                                                height="1.2em"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 64 64">
                                                                <path fill="#ec1c24" d="M50.592 2.291L32 20.884C25.803 14.689 19.604 8.488 13.406 2.291c-7.17-7.17-18.284 3.948-11.12 11.12c6.199 6.193 12.4 12.395 18.592 18.592A32589.37 32589.37 0 0 1 2.286 50.595c-7.164 7.168 3.951 18.283 11.12 11.12c6.197-6.199 12.396-12.399 18.593-18.594l18.592 18.594c7.17 7.168 18.287-3.951 11.12-11.12c-6.199-6.199-12.396-12.396-18.597-18.594c6.2-6.199 12.397-12.398 18.597-18.596c7.168-7.166-3.949-18.284-11.12-11.11"/>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="px-6 py-2 text-xs whitespace-no-wrap" colspan="4">No Results Found</td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br/>
                @if (!empty($query))
                    {{ $productsSearched->links() }}
                @else
                    {{ $products->links() }}
                @endif
            </div>
        </div>
        {{-- Start of Modal Form --}}
        <div>
            <x-jet-dialog-modal wire:model="modalFormVisible">
                <x-slot name="title">
                    {{ __('Product') }}
                </x-slot>

                <x-slot name="content">
                    <div class="mt-4">
                        <x-jet-label for="name" value="{{ __('Name') }}" class="text-lg dark:text-white" />
                        <x-jet-input id="name" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="name" />
                        @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="category" value="{{ __('Slug') }}" class="text-lg dark:text-white" />
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <div class="mt-1 flex rounded-md shadow-sm">
                                    <span class="hidden md:inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 dark:bg-gray-500 dark:text-white text-sm">
                                        https://relyface.com/product-categories/product-category-show/
                                    </span>
                                    <x-jet-input  id="slug" wire:model="slug" class="form-input px-3 flex-1 block w-full rounded-l-md rounded-r-md md:rounded-l-none border border-r-0 border-gray-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-500 dark:text-white" placeholder="url-slug" />
                                </div>
                        @error('slug') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="short_description" value="{{ __('Short Description') }}" class="text-lg dark:text-white" />
                        <x-jet-input id="short_description" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="shortDescription" />
                        @error('shortDescription') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" class="text-lg dark:text-white" />
                        <x-jet-input id="description" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="description" />
                        @error('description') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="mt-4">
                        <x-jet-label for="regular_price" value="{{ __('Regular Price') }}" class="text-lg dark:text-white" />
                        <x-jet-input id="regular_price" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="regularPrice" />
                        @error('regularPrice') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="sale_price" value="{{ __('Sale Price') }}" class="text-lg dark:text-white" />
                        <x-jet-input id="sale_price" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="salePrice" />
                        @error('salePrice') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="SKU" value="{{ __('SKU') }}" class="text-lg dark:text-white" />
                        <x-jet-input id="SKU" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="SKU" />
                        @error('SKU') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="quantity" value="{{ __('Quantity') }}" class="text-lg dark:text-white" />
                        <x-jet-input id="quantity" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="quantity" />
                        @error('quantity') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="procuct_images" value="{{ __('Product Images') }}" class="text-lg dark:text-white" />
                        <x-jet-input id="procuct_images" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="procuctImages" />
                        @error('procuctImages') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-4">
                        <label>
                            <input class="form-checkbox" type="checkbox" value="{{ $stockStatus }}" wire:model="stockStatus"/>
                            <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as in-stock product</span>
                        </label>
                    </div>
                    <div class="mt-4">
                        <label>
                            <input class="form-checkbox" type="checkbox" value="{{ $featured }}" wire:model="featured"/>
                            <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as featured product</span>
                        </label>
                    </div>
                    <div class="mt-4">
                        <label>
                            <input class="form-checkbox" type="checkbox" value="{{ $isSetToActive }}" wire:model="isSetToActive"/>
                            <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as active product</span>
                        </label>
                    </div>
                    <div class="pt-4">
                        <label class="block text-base ">
                            <span class="text-gray-700 dark:text-gray-50">Select Product Category</span>
                            <select wire:model="productCategoryId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                {{-- <option value="{{ $this->professionsCategory }}">{{ $professionsCategory->category }}</option> --}}
                                @foreach($productCategories as $item)
                                    <option class="text-sm" value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="pt-4">
                        <label class="block text-base ">
                            <span class="text-gray-700 dark:text-gray-50">Select Product Category</span>
                            <select wire:model="productSubCategoryId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                {{-- <option value="{{ $this->professionsCategory }}">{{ $professionsCategory->category }}</option> --}}
                                @foreach($productSubCategories as $item)
                                    <option class="text-sm" value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    {{-- <div class="mt-4">
                        <x-jet-label for="shortDescription" value="{{ __('Short Description') }}" class="text-lg dark:text-white" />
                        <div class="rounded-md shadow-sm">
                            <div class="mt-1 bg-white dark:bg-gray-500 dark:text-white">
                                <div class="body-content" wire:ignore>
                                    <trix-editor
                                        name="shortDescription"
                                        class="trix-content trix-past"
                                        style="height: 100px !important;  overflow-y: auto !important;"
                                        x-ref="trix"
                                        wire:model.debounce.800ms="shortDescription"
                                        wire:key="trix-content-unique-key"
                                        trix-attachment-add="$event.attachment"
                                    ></trix-editor>
                                </div>
                            </div>
                        </div>
                        @error('shortDescription') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="mt-4">
                        <x-jet-label for="description" value="{{ __('Description') }}" class="text-lg dark:text-white" />
                        <div class="rounded-md shadow-sm">
                            <div class="mt-1 bg-white dark:bg-gray-500 dark:text-white">
                                <div class="body-content" wire:ignore>
                                    <trix-editor
                                        name="description"
                                        class="trix-content trix-past"
                                        style="height: 200px !important;  overflow-y: auto !important;"
                                        x-ref="trix"
                                        wire:model.debounce.800ms="description"
                                        wire:key="trix-content-unique-key"
                                        trix-attachment-add="$event.attachment"
                                    ></trix-editor>
                                </div>
                            </div>
                        </div>
                        @error('description') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <!-- post banner image upload -->
                    <div class="pt-4">
                        <div class="pt-2 pb-2">
                            Upload page banner image: <i>This will be displayed as a banner to the page</i>
                        </div>
                        <div
                            x-data="{ isUploading: false, progress: 0 }"
                            x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress"
                        >
                            <!-- File Input -->
                            @if(!empty($this->productBannerImage))
                                <input type="file" value="{{ $this->productBannerImage }}" wire:model="imageUploaded">
                                <img src="{{ env('APP_URL') . '/products-images/' . $this->productBannerImage }}">

                                <!-- Progress Bar -->
                                <div class="pt-2 pb-2" x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                                <div class="pt-4">
                                    @if ($imageUploaded)
                                    <h3>Image Preview:</h3>
                                        <img src="{{ $imageUploaded->temporaryUrl() }}">
                                    @endif
                                </div>
                            @else
                            <input type="file" wire:model="imageUploaded">
                                <!-- Progress Bar -->
                                <div class="pt-2 pb-2" x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                                <div class="pt-4">
                                    @if ($imageUploaded)
                                        <h3>Image Preview:</h3>
                                        <img src="{{ $imageUploaded->temporaryUrl() }}">
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                        {{ __('Nevermind') }}
                    </x-jet-secondary-button>

                    @if ($modelId)
                        <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                            {{ __('Update') }}
                        </x-jet-danger-button>
                    @else
                        <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                            {{ __('Create') }}
                        </x-jet-danger-button>
                    @endif

                </x-slot>
            </x-jet-dialog-modal>
        </div>
        {{-- End of Modal Form --}}

        {{-- Start of Delete Modal --}}
        <div>
            <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
                <x-slot name="title">
                    {{ __('Delete Product') }}
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you want to delete this product? Once the product is deleted, all of its resources and data will be permanently deleted.') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                        {{ __('Nevermind') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                        {{ __('Delete') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
        </div>
        {{-- End of Delete Modal --}}
    </div>
</div>
