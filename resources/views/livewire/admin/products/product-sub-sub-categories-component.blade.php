<div class="mx-auto py-4 sm:px-4 lg:px-4rounded-md dark:bg-gray-700 dark:text-white">
    <div class="container mx-auto px-4 sm:px-4">
        <div class="py-2">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Product Sub Sub Categories</h2>
            </div>
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="sm:w-10/12 sm:flex rounded">
                    <div class="sm:flex flex-row mb-1 sm:mb-0">
                        <div class="block mt-2 sm:ml-2">
                            <select wire:model="recordsToDisplay"
                            class="h-full border block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500">
                                <option>10</option>
                                <option>20</option>
                                <option>30</option>
                                <option>40</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                        </div>
                        <div class="block mt-2 sm:ml-2">
                            <select wire:model="isActive"
                                class="h-full border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500">
                                <option disabled>Active/Inactive</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex mt-2 sm:ml-2 text-gray-600">
                        <input
                            type="text"
                            class="h-full border block appearance-none bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500 rounded-2xl text-gray-800 dark:text-gray-50 bg-gray-100 dark:bg-gray-500 dark:placeholder-gray-300"
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
                <div class="sm:w-2/12 mt-2 sm:flex justify-end text-right">
                    <div class="flex items-center justify-end text-right">
                        <x-jet-button wire:click="createShowModal">
                            {{ __('Create') }}
                        </x-jet-button>
                    </div>
                </div>
            </div>
            {{-- The data table --}}
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow rounded-lg">

                            <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-700 dark:text-white">
                                <thead>
                                    <tr class="dark:bg-gray-800">
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Slug</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Content</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Image</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Is Active</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Main Category</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Product Sub Category</th>
                                        <th class="px-6 py-3 text-left text-xs leading-4 font-medium uppercase tracking-wider">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @if (!empty($query))
                                        @if ($productSubSubCategoriesSearched->count())
                                            @foreach ($productSubSubCategoriesSearched as $item)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->name }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        <a
                                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="{{ route('posts.post-show', $item->slug) }}">
                                                            {{ $item->slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {!! Str::limit($item->content, $limit = 30, $end = '') !!}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->image }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->is_active }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->main_category_id }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->product_sub_category_id }}
                                                    </td>
                                                    <td class="px-6 py-4 text-right text-sm">
                                                        <button>
                                                            <button wire:click="updateShowModal({{ $item->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                width="2em"
                                                                height="2em"
                                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 576 512">
                                                                <path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9L216.2 301.8l-7.3 65.3l65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1l30.9-30.9c4-4.2 4-10.8-.1-14.9z" fill="#2ecc71 "/>
                                                            </svg>
                                                        </button>
                                                        <button wire:click="deleteShowModal({{ $item->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                            aria-hidden="true"
                                                            focusable="false"
                                                            width="2em"
                                                            height="2em"
                                                            style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                            preserveAspectRatio="xMidYMid meet"
                                                            viewBox="0 0 64 64">
                                                            <path d="M62 52c0 5.5-4.5 10-10 10H12C6.5 62 2 57.5 2 52V12C2 6.5 6.5 2 12 2h40c5.5 0 10 4.5 10 10v40z"
                                                            fill="#ff5a79"/>
                                                            <path fill="#fff" d="M50 21.2L42.8 14L32 24.8L21.2 14L14 21.2L24.8 32L14 42.8l7.2 7.2L32 39.2L42.8 50l7.2-7.2L39.2 32z"/>
                                                        </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                            </tr>
                                        @endif
                                    @else
                                        @if ($productSubSubCategories->count())
                                            @foreach ($productSubSubCategories as $item)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->name }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        <a
                                                        class="text-blue-500 hover:text-blue-400 dark:text-blue-300 dark:hover:text-blue-400"
                                                            target="_blank"
                                                            href="{{ route('posts.post-show', $item->slug) }}">
                                                            {{ $item->slug }}
                                                        </a>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {!! Str::limit($item->content, $limit = 30, $end = '') !!}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->image }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->is_active }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->main_category_id }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $item->product_sub_category_id }}
                                                    </td>
                                                    <td class="px-6 py-4 text-right text-sm">
                                                        <button>
                                                            <button wire:click="updateShowModal({{ $item->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                width="2em"
                                                                height="2em"
                                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 576 512">
                                                                <path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9L216.2 301.8l-7.3 65.3l65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1l30.9-30.9c4-4.2 4-10.8-.1-14.9z" fill="#2ecc71 "/>
                                                            </svg>
                                                        </button>
                                                        <button wire:click="deleteShowModal({{ $item->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                aria-hidden="true"
                                                                focusable="false"
                                                                width="2em"
                                                                height="2em"
                                                                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                                preserveAspectRatio="xMidYMid meet"
                                                                viewBox="0 0 64 64">
                                                                <path d="M62 52c0 5.5-4.5 10-10 10H12C6.5 62 2 57.5 2 52V12C2 6.5 6.5 2 12 2h40c5.5 0 10 4.5 10 10v40z"
                                                                fill="#ff5a79"/>
                                                                <path fill="#fff" d="M50 21.2L42.8 14L32 24.8L21.2 14L14 21.2L24.8 32L14 42.8l7.2 7.2L32 39.2L42.8 50l7.2-7.2L39.2 32z"/>
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            @if (!empty($query))
                {{ $productSubSubCategoriesSearched->links() }}
            @else
                {{ $productSubSubCategories->links() }}
            @endif
        </div>
    </div>
    {{-- Modal Form --}}
    <div>
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Product Sub Sub Category') }}
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
                                    https://relyface.com/product-categories/product-category-detail/
                                </span>
                                <x-jet-input  id="slug" wire:model="slug" class="form-input px-3 flex-1 block w-full rounded-l-md rounded-r-md md:rounded-l-none border border-r-0 border-gray-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 dark:bg-gray-500 dark:text-white" placeholder="url-slug" />
                            </div>
                    @error('slug') <span class="error text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="pt-4">
                    <label class="block text-base ">
                        <span class="text-gray-700 dark:text-gray-50">Select Main Category</span>
                        <select wire:model="mainCategoryId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                            <option>Select Main Category</option>
                            @foreach($mainCategories as $item)
                                <option class="text-sm" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </label>
                    <x-jet-input-error for="mainCategoryId" class="mt-2" />
                </div>
                <div class="pt-4">
                    <label class="block text-base ">
                        <span class="text-gray-700 dark:text-gray-50">Select Product Sub Category</span>
                        <select wire:model="productSubCategoryId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                            <option>Select Products Sub Category</option>
                            @foreach($productSubCategories as $item)
                                <option class="text-sm" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="mt-4">
                    <label>
                        <input class="form-checkbox" type="checkbox" value="{{ $isSetToActive }}" wire:model="isSetToActive"/>
                        <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as active</span>
                    </label>
                </div>
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Content') }}" class="text-lg dark:text-white" />
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white dark:bg-gray-500 dark:text-white">
                            <div class="body-content" wire:ignore>
                                <trix-editor
                                    name="content"
                                    class="trix-content trix-past"
                                    style="height: 200px !important;  overflow-y: auto !important;"
                                    x-ref="trix"
                                    wire:model.debounce.800ms="content"
                                    wire:key="trix-content-unique-key"
                                    trix-attachment-add="$event.attachment"
                                ></trix-editor>
                            </div>
                        </div>
                    </div>
                    @error('content') <span class="error text-red-500">{{ $message }}</span> @enderror
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
                        @if(!empty($this->image))
                            <input type="file" value="{{ $this->image }}" wire:model="imageUploaded">
                            <img src="{{ env('APP_URL') . '/product-categories-images/' . $this->image }}">

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

    {{-- The Delete Modal --}}
    <div>
        <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
            <x-slot name="title">
                {{ __('Delete') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete this category? Once the category is deleted, all of its resources and data will be permanently deleted.') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete Post') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
