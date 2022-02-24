<x-jet-form-section submit="create">
    <x-slot name="title">
        {{ __('Product Sub Categories') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add product sub categories.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-6">

            <!-- product Categories -->
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

            <!-- Add Sub Category -->
            <div class="pt-4 col-span-6 sm:col-span-6">
                <x-jet-label for="productSubCategory" value="{{ __('Product Sub Category') }}" />
                <x-jet-input id="productSubCategory" type="text" class="mt-1 block w-full" wire:model.defer="productSubCategory" autocomplete="productSubCategory" />
                <x-jet-input-error for="productSubCategory" class="mt-2" />
            </div>

            <!-- Add Category -->
            <div class="pt-4 col-span-6 sm:col-span-6">
                <x-jet-input-error for="productSubCategorySlug" class="mt-2" />
            </div>

            <!-- Add Category content-->
            <div class="pt-4 col-span-6 sm:col-span-6">
                <x-jet-label for="productSubCategoryContent" value="{{ __('Content') }}" class="text-lg dark:text-white" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white dark:bg-gray-500 dark:text-white">
                        <div class="body-content" wire:ignore>
                            <trix-editor
                                name="content"
                                class="trix-content trix-past"
                                style="height: 150px !important;  overflow-y: auto !important;"
                                x-ref="trix"
                                wire:model.debounce.800ms="productSubCategoryContent"
                                wire:key="trix-content-unique-key"
                                trix-attachment-add="$event.attachment"
                            ></trix-editor>
                        </div>
                    </div>
                </div>
                @error('productSubCategoryContent') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>

        </div>
    </x-slot>

    <x-slot name="actions">

        <div class="mr-4 text-green-500">
            @if(session()->has('message'))
                {{ session('message') }}
            @endif
        </div>

        <x-jet-action-message class="mr-3 dark:bg-green-500" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="dark:bg-green-500">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
