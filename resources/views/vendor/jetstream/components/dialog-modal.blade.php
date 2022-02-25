@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800 dark:text-gray-300">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end px-6 py-4 text-right bg-gray-50 dark:bg-gray-800 dark:text-gray-300">
        {{ $footer }}
    </div>
</x-jet-modal>
