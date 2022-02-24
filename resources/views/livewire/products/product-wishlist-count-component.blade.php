<div class="" id="wishlist">
    <a
        href="{{ route('products.product-wishlist') }}"
        class="w-16 flex flex-col flex-grow items-center justify-center
        overflow-hidden whitespace-no-wrap text-sm transition-colors duration-100
        ease-in-out dark:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-md focus:text-orange-500">
        <div class="flex">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                aria-hidden="true"
                focusable="false"
                width="2em"
                height="2em"
                style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                preserveAspectRatio="xMidYMid meet"
                viewBox="0 0 24 24">
                <path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558a5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z" fill="#626262"/>
            </svg>
            @if(Cart::instance('wishlist')->count() > 0)
                <div class="pl-2 pr-1 text-base font-semibold text-yellow-500 dark:text-yellow-500">{{ Cart::instance('wishlist')->count() }}</div>
            @else
                <div class="pl-2 pr-1 text-base font-semibold text-yellow-500 dark:text-yellow-500">0</div>
            @endif
        </div>
        <span class="text-sm">Wishlist</span>
    </a>
</div>
