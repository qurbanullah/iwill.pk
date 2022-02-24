<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-900 hover:bg-gray-700 dark:hover:bg-gray-400 uppercase tracking-widest active:bg-gray-900 dark:active:bg-gray-200 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
