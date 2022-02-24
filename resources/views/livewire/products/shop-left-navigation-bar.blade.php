<div class="">
    <div class="w-full sm:min-h-screen bg-gray-50 dark:bg-gray-800">
        <nav class="mt-2">
            <div class="block pt-4 pb-4 border-b">
                <div class="pl-4">
                    <span class="font-semibold" dir="auto">Department</span>
                </div>
                <div>
                    <ul class="pl-8">
                        @foreach ($productCategories as $item)
                        <li class="pt-2">
                            <a
                                href="{{ route('products.products-by-category', $item->slug) }}"
                                class="hover:text-yellow-500">
                                <span class="" dir="auto">
                                    {{ $item->name }}
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="block pt-4 pb-4 border-b text-gray-600 dark:text-gray-300 ">
                <div class="pl-4">
                    <span class="font-semibold" dir="auto">Brands</span>
                </div>
                <div class="pl-8">
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" checked>
                            <span class="ml-2">Dell</span>
                        </label>
                    </div>
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Hp</span>
                        </label>
                    </div>
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Sony</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="block pt-4 pb-4 border-b text-gray-600 dark:text-gray-300 ">
                <div class="pl-4">
                    <span class="font-semibold" dir="auto">Warranty Type</span>
                </div>
                <div class="pl-8">
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" checked>
                            <span class="ml-2">Barand Warranty</span>
                        </label>
                    </div>
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Seller Waranty</span>
                        </label>
                    </div>
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">Local Warranty</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="block pt-4 pb-4 border-b text-gray-600 dark:text-gray-300 ">
                <div class="pl-4">
                    <span class="font-semibold" dir="auto">Warranty Period</span>
                </div>
                <div class="pl-8">
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" checked>
                            <span class="ml-2">1 Month</span>
                        </label>
                    </div>
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">3 Month</span>
                        </label>
                    </div>
                    <div class="pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox">
                            <span class="ml-2">1 Yeaar</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- between two numbers -->
            <div class="block pt-4 pb-4 border-b text-gray-600 dark:text-gray-300 ">
                <div class="pl-4">
                    <span class="font-semibold" dir="auto">Price Range</span>
                </div>

                <div class="py-1 flex relative min-w-full">
                    <span>0</span>
                    <input type="range" name="rangeInput" min="0" max="10000" onchange="updateTextInput(this.value);">
                    <input class="w-16 text-sm dark:bg-gray-800 border-none" type="text" id="textInput" value="">
                </div>
                <script>
                    function updateTextInput(val) {
                        document.getElementById('textInput').value=val;
                    }
                </script>
            </div>
        </nav>
    </div>
</div>
