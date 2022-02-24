<div class="pl-2" id="minicart">
    <a
        href="{{ route('products.product-cart') }}"
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
                viewBox="0 0 16 16">
                <g fill="#626262">
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607l1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4a2 2 0 0 0 0-4h7a2 2 0 1 0 0 4a2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0a1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0a1 1 0 0 1 2 0zm-1.646-7.646l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                </g>
            </svg>
            @if(Cart::instance('cart')->count() > 0)
                <div class="pl-2 pr-1 text-base font-semibold text-yellow-500 dark:text-yellow-500">{{ Cart::instance('cart')->count() }}</div>
            @else
                <div class="pl-2 pr-1 text-base font-semibold text-yellow-500 dark:text-yellow-500">0</div>
            @endif
        </div>
        <span class="text-sm">Cart</span>
    </a>
</div>
