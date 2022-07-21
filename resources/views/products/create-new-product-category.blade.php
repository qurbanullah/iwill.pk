<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto">
            {{-- <h1 class="text-base font-semibold">Add new Service</h1> --}}
            {{-- @livewire('left-side-nevigation') --}}
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-gray-100 dark:bg-gray-700">
        <div class="py-4 sm:px-6 lg:px-8 rounded-md dark:bg-gray-700 dark:text-white">
            @if (session('status'))
                <div class="alert alert-success text-green-500">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                    Add new Product Category
                </div>
                <div class="card-body">
                    <form name="create-new-product-category-form" id="create-new-product-category-form" method="post"
                        action="{{ url('/products/create-new-product-category-store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-4 form-group">
                            <label for="name" value="{{ __('Name') }}" class="text-lg  dark:text-white">
                                <input id="name" name="name" class="w-full dark:bg-gray-500" type="text" required />
                            </label>
                            @error('slug') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-4 form-group">
                            <label>
                                <input id="is-active" name="is_active" class="form-checkbox" type="checkbox" />
                                <span class="ml-2 text-sm text-gray-500 dark:text-white">Set as active</span>
                            </label>
                        </div>

                        <div class="mt-4 form-group">
                            <x-jet-label for="title" value="{{ __('Content') }}" class="text-lg dark:text-gray-300" />
                            <div class="rounded-md shadow-sm">
                                <div class="bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-300 text-sm">
                                    <div class="body-content">
                                        <textarea
                                            name="content"
                                            class="w-full dark:bg-gray-500"
                                            style="height: 200px !important;  overflow-y: auto !important;"
                                            required
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                            @error('content') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <!-- Product category image upload with display using alpinjs -->
                        <div class="pt-4">
                            <div class="pt-2 pb-2">
                                Upload product category image: <i>This will be displayed as product category image</i>
                            </div>
                            <div>
                                <div x-data="imageViewer()">
                                    <div class="mb-2">
                                      <!-- Show the image -->
                                      <template x-if="imageUrl">
                                        <img :src="imageUrl"
                                             class="object-cover rounded border border-gray-200"
                                             style="width: 200px; height: 200px;"
                                        >
                                      </template>

                                      <!-- Show the gray box when image is not available -->
                                      {{-- <template x-if="!imageUrl">
                                        <div
                                             class="border rounded border-gray-200 bg-gray-100"
                                             style="width: 200px; height: 200px;"
                                        ></div>
                                      </template> --}}

                                      <!-- Image file selector -->
                                      <input class="mt-2" type="file" name="image" accept="image/*" @change="fileChosen">

                                    </div>
                                  </div>
                            </div>
                            @error('image') <span class="error text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-4 form-group flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-900 hover:bg-gray-700 dark:hover:bg-gray-400 uppercase tracking-widest active:bg-gray-900 dark:active:bg-gray-200 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">{{ __('Submit') }}</button>
                        </div>

                    </form>
                </div>
                <script>
                    function imageViewer() {
                        return {
                            imageUrl: '',

                            fileChosen(event) {
                            this.fileToDataUrl(event, src => this.imageUrl = src)
                            },

                            fileToDataUrl(event, callback) {
                            if (! event.target.files.length) return

                            let file = event.target.files[0],
                                reader = new FileReader()

                            reader.readAsDataURL(file)
                            reader.onload = e => callback(e.target.result)
                            },
                        }
                        }
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
