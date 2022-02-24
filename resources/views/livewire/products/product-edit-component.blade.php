<x-slot name="header">
    <div class="mx-auto">
        <h2>Edit Service</h2>
    </div>
</x-slot>
<div class="p-4 w-full mx-auto px-4 sm:px-6 lg:px-8 sm:flex flex-wrap">
    <div class="sm:w-2/12 bg-gray-50 dark:bg-gray-800 rounded shadow-lg">
        @livewire('users.user-dashboard-left-navigation-bar')
    </div>
    <div class="sm:w-10/12 bg-gray-100 dark:bg-gray-700">
        <div class="max-w-4xl mx-auto py-4 sm:px-6 lg:px-8 rounded-md dark:bg-gray-700 dark:text-white">
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
            {{-- <div class="mt-4">
                <x-jet-label for="short_description" value="{{ __('Short Description') }}" class="text-lg dark:text-white" />
                <x-jet-input id="short_description" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="shortDescription" />
                @error('shortDescription') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div> --}}
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
            {{-- <div class="mt-4">
                <x-jet-label for="SKU" value="{{ __('SKU') }}" class="text-lg dark:text-white" />
                <x-jet-input id="SKU" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="SKU" />
                @error('SKU') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div> --}}
            <div class="mt-4">
                <x-jet-label for="quantity" value="{{ __('Quantity') }}" class="text-lg dark:text-white" />
                <x-jet-input id="quantity" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="quantity" />
                @error('quantity') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
            {{-- <div class="mt-4">
                <x-jet-label for="procuct_images" value="{{ __('Product Images') }}" class="text-lg dark:text-white" />
                <x-jet-input id="procuct_images" class="block mt-1 w-full dark:bg-gray-500 dark:text-white" type="text" wire:model.debounce.800ms="procuctImages" />
                @error('procuctImages') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div> --}}
            <div class="mt-4">
                <label>
                    <input class="form-checkbox" type="checkbox" value="{{ $stockStatus }}" wire:model="stockStatus"/>
                    <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as in-stock product</span>
                </label>
            </div>
            {{-- <div class="mt-4">
                <label>
                    <input class="form-checkbox" type="checkbox" value="{{ $featured }}" wire:model="featured"/>
                    <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as featured product</span>
                </label>
            </div> --}}
            <div class="mt-4">
                <label>
                    <input class="form-checkbox" type="checkbox" value="{{ $isSetToActive }}" wire:model="isSetToActive"/>
                    <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as active product</span>
                </label>
            </div>
            <div class="pt-4">
                <label class="block text-base ">
                    <span class="text-gray-700 dark:text-gray-50">Select Business</span>
                    <select wire:model="businessId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                        <option>Select Business</option>
                        @foreach($businesses as $item)
                            <option class="text-sm" value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </label>
                <x-jet-input-error for="mainCategoryId" class="mt-2" />
            </div>
            <div class="pt-4">
                <label class="block text-base ">
                    <span class="text-gray-700 dark:text-gray-50">Select Product Category</span>
                    <select wire:model="productCategoryId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                        <option>Select Product Category</option>
                        @foreach($productCategories as $item)
                            <option class="text-sm" value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </label>
                <x-jet-input-error for="productCategoryId" class="mt-2" />
            </div>
            <div class="pt-4">
                <label class="block text-base ">
                    <span class="text-gray-700 dark:text-gray-50">Select Product Sub Category</span>
                    <select wire:model="productSubCategoryId" class="w-96 form-select block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                        <option>Select Product Sub Category</option>
                        @foreach($productSubCategories as $item)
                            <option class="text-sm" value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </label>
                <x-jet-input-error for="productSubCategoryId" class="mt-2" />
            </div>
            <div class="mt-4">
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
            </div>
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
            <!-- Start service images upload -->
            <div class="pt-4">
                <div class="pt-2 pb-2">
                    <span class="pr-1 font-semibold">Upload Product images:</span><i>Maximum six (6) images is allowed per product.</i>
                </div>
                <div class="form-group">
                    <input type="file" class="" wire:model="productImagesUploaded" multiple>
                    @error('productImagesUploaded') <span class="error text-red-500">{{ $message }}</span>@enderror
                </div>
            </div>
            <!-- End service images upload -->
            <div class="pt-8">
                <div class="inline">
                    <x-jet-button class="dark:bg-green-500 dark:text-white" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Update') }}
                    </x-jet-danger-button>
                </div>
                <div class="ml-12 inline text-green-500">
                    @if (session()->has('success_message'))
                        {{ session('success_message') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
