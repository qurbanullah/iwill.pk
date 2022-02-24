<x-jet-form-section submit="create">
    <x-slot name="title">
        {{ __('Products Categories') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add products Categories.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-6">

            <!-- Add Category -->
            <div class="pt-4 col-span-6 sm:col-span-6">
                <x-jet-label for="productCategory" value="{{ __('Product Category') }}" />
                <x-jet-input id="productCategory" type="text" class="mt-1 block w-full" wire:model.defer="productCategory" autocomplete="productCategory" />
                <x-jet-input-error for="productCategory" class="mt-2" />
            </div>

            <!-- Add Category -->
            <div class="pt-4 col-span-6 sm:col-span-6">
                <x-jet-input-error for="productCategorySlug" class="mt-2" />
            </div>

            <!-- Add Category content-->
            <div class="pt-4 col-span-6 sm:col-span-6">
                <x-jet-label for="productCategoryContent" value="{{ __('Content') }}" class="text-lg dark:text-white" />
                <div class="rounded-md shadow-sm">
                    <div class="mt-1 bg-white dark:bg-gray-500 dark:text-white">
                        <div class="body-content" wire:ignore>
                            <trix-editor
                                name="productCategoryContent"
                                class="trix-content trix-past"
                                style="height: 150px !important;  overflow-y: auto !important;"
                                x-ref="trix"
                                wire:model.debounce.800ms="productCategoryContent"
                                wire:key="trix-content-unique-key"
                                trix-attachment-add="$event.attachment"
                            ></trix-editor>
                        </div>
                    </div>
                </div>
                @error('productCategoryContent') <span class="error text-red-500">{{ $message }}</span> @enderror
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
