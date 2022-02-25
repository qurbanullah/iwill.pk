<main id="main" class="main-site">
    {{-- start of container --}}
    <div class="container max-w-7xl mx-auto">
        <div class="main-content-area">
            {{-- product cart items --}}
            <div id="cart-items" class="">
                @if (session()->has('message'))
                    <div class="w-full bg-green-100 dark:bg-green-200 dark:text-gray-800">
                        <p class="p-3">{{ session('message') }}</p>
                    </div>
                @endif
                @if(Cart::instance('cart')->count() > 0)
                    <div class="py-2 w-full">
                        <h3 class="py-2 px-2 text-2xl"><span>{{ Cart::instance('cart')->count() }}</span> Item(s) in the cart</h3>
                    </div>
                    <ul class="products-cart">
                        @foreach(Cart::instance('cart')->content() as $item)
                            <li class="h-24 grid grid-cols-6 grid-flow-col items-center border-t">
                                <div class="relative overflow-hidden">
                                    <a
                                        class="block bg-white dark:bg-gray-700 rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                        href="{{ route('products.product-detail', Crypt::encrypt($item->model->id)) }}"
                                    >
                                        <img
                                            class="h-16 w-16 p-2 object-contain"
                                            src="{{ env('APP_URL') . '/products-images/' . $item->model->product_banner_image }}"
                                            alt="{{ $item->model->name }}"
                                        >
                                    </a>
                                </div>
                                <div class="p-2 col-span-2">
                                    <a
                                        class="text-blue-500 hover:text-yellow-500 dark:text-blue-300 dark:hover:text-yellow-500"
                                        href="{{ route('products.product-detail', Crypt::encrypt($item->model->id)) }}"
                                    >
                                        {{ $item->model->name }}
                                    </a>
                                </div>
                                <div class="p-2">
                                    <p class="">Rs.{{ $item->model->regular_price }}</p>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <div class="flex flex-row h-10 w-32 rounded-lg relative bg-transparent">
                                            <button class="-mr-10" wire:click.prevent="decreaseCartQuantity('{{ $item->rowId }}')">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    width="2em"
                                                    height="2em"
                                                    style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                    preserveAspectRatio="xMidYMid meet"
                                                    viewBox="0 0 1024 1024">
                                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm192 472c0 4.4-3.6 8-8 8H328c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h368c4.4 0 8 3.6 8 8v48z" fill="#626262"/>
                                                </svg>
                                            </button>

                                            <input
                                                class="outline-none focus:outline-none text-center w-32 bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                                type="number"
                                                name="product-quatity"
                                                value="{{ $item->qty }}"
                                                data-max="120"
                                                pattern="[0-9]*"
                                                />

                                            <button class="-ml-10" wire:click.prevent="increaseCartQuantity('{{ $item->rowId }}')">
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
                                                    <g fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1zm1 15a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3z" fill="#626262"/>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="py-1">
                                            <a
                                            wire:click.prevent="SwitchToSaveForLater('{{ $item->rowId }}')"
                                            href="#"
                                            class="text-blue-500 hover:text-yellow-500 dark:text-blue-300 dark:hover:text-yellow-500 "
                                            >
                                                Save for later
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">Rs.{{ $item->subtotal }}</div>

                                <div class="p-2 grid grid-cols-1 place-items-end">
                                    <button wire:click.prevent="deleteCartItem('{{ $item->rowId }}')">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            aria-hidden="true"
                                            role="img"
                                            width="1.2em"
                                            height="1.2em"
                                            preserveAspectRatio="xMidYMid meet"
                                            viewBox="0 0 64 64">
                                            <path fill="#ec1c24" d="M50.592 2.291L32 20.884C25.803 14.689 19.604 8.488 13.406 2.291c-7.17-7.17-18.284 3.948-11.12 11.12c6.199 6.193 12.4 12.395 18.592 18.592A32589.37 32589.37 0 0 1 2.286 50.595c-7.164 7.168 3.951 18.283 11.12 11.12c6.197-6.199 12.396-12.399 18.593-18.594l18.592 18.594c7.17 7.168 18.287-3.951 11.12-11.12c-6.199-6.199-12.396-12.396-18.597-18.594c6.2-6.199 12.397-12.398 18.597-18.596c7.168-7.166-3.949-18.284-11.12-11.11"/>
                                        </svg>
                                    </button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            {{-- end product cart items --}}
            {{-- product cart summary --}}
            @if(Cart::instance('cart')->count())
                <div id="cart-summary" class="mt-16 pt-4 pb-4 border">
                    <div class="grid grid-cols-3 grid-flow-col items-top">
                        <div class="col-span-2">
                            <h4 class="p-2">Order Summary</h4>
                            <div class="">
                                <div class="grid grid-cols-2 grid-flow-col items-center">
                                    <div>
                                        <p class="p-2"><span class="title">Subtotal:</span></p>
                                    </div>
                                    <div>
                                        <p><b class="p-2">Rs.{{ Cart::instance('cart')->subtotal() }}</b></p>
                                    </div>
                                </div>
                                @if (session()->has('coupon'))
                                    <div class="grid grid-cols-2 grid-flow-col items-center">
                                        <div class="flex">
                                            <div>
                                                <p class="p-2"><span class="title">Discount:</span><span class="pl-1">({{ Session::get('coupon')['code'] }})</span></p>
                                            </div>
                                            <div class="grid grid-cols-1">
                                                <button wire:click.prevent="removeCoupon">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        aria-hidden="true"
                                                        focusable="false"
                                                        width="1em"
                                                        height="1em"
                                                        style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                        preserveAspectRatio="xMidYMid meet"
                                                        viewBox="0 0 64 64">
                                                        <path d="M62 52c0 5.5-4.5 10-10 10H12C6.5 62 2 57.5 2 52V12C2 6.5 6.5 2 12 2h40c5.5 0 10 4.5 10 10v40z"
                                                        fill="#ff5a79"/>
                                                        <path fill="#fff" d="M50 21.2L42.8 14L32 24.8L21.2 14L14 21.2L24.8 32L14 42.8l7.2 7.2L32 39.2L42.8 50l7.2-7.2L39.2 32z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <p><b class="p-2">-Rs.{{ number_format($this->discount, 2) }}</b></p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 grid-flow-col items-center">
                                        <div>
                                            <p class="p-2"><span class="title">Sub Total after Discount:</span></p>
                                        </div>
                                        <div>
                                            <p><b class="p-2">Rs.{{ number_format($this->subTotalAferDiscount, 2) }}</b></p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 grid-flow-col items-center">
                                        <div>
                                            <p class="p-2"><span class="title">Tax:</span></p>
                                        </div>
                                        <div>
                                            <p><b class="p-2">Rs.0.00</b></p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 grid-flow-col items-center">
                                        <div>
                                            <p class="p-2"><span class="title">Shipping:</span></p>
                                        </div>
                                        <div>
                                            <p><b class="p-2">Free Shipping</b></p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 grid-flow-col items-center">
                                        <div>
                                            <p class="p-2"><span class="title">Total</span></p>
                                        </div>
                                        <div>
                                            <p><b class="p-2">Rs.{{ number_format($this->TotalAfterDiscount,2) }}</b></p>
                                        </div>
                                    </div>
                                @else
                                    <div class="grid grid-cols-2 grid-flow-col items-center">
                                        <div>
                                            <p class="p-2"><span class="title">Tax:</span></p>
                                        </div>
                                        <div>
                                            <p><b class="p-2">Rs.0.00</b></p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 grid-flow-col items-center">
                                        <div>
                                            <p class="p-2"><span class="title">Shipping:</span></p>
                                        </div>
                                        <div>
                                            <p><b class="p-2">Free Shipping</b></p>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 grid-flow-col items-center">
                                        <div>
                                            <p class="p-2"><span class="title">Total</span></p>
                                        </div>
                                        <div>
                                            <p><b class="p-2">Rs.{{ Cart::instance('cart')->subtotal() }}</b></p>
                                        </div>
                                    </div>


                                @endif
                            </div>
                        </div>

                        {{-- apply coupon code --}}
                        <div id="apply-coupon">
                            <div>
                                <label class="pr-2">I have promo code</label>
                                <input class="pl-2" name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponcode">
                            </div>
                            @if($haveCouponcode == 1)
                                <div class="pt-4 pb-4">
                                    <label class="coupon-infut-field">Enter coupon code:</label>
                                        <input
                                            wire:model.debounce.800ms="couponCode"
                                            type="text"
                                            class="dark:bg-gray-700"
                                        >
                                    @if (session()->has('coupon_message'))
                                        <div class="w-full bg-green-100 dark:bg-green-200 dark:text-gray-800">
                                            <p class="mt-2 mb-2 p-2">{{ session('coupon_message') }}</p>
                                        </div>
                                    @endif
                                    <button
                                        wire:click.prevent="applyCouponCode"
                                        class="pl-8 mt-4 pt-2 pr-8 pb-2 w-full text-center text-base font-semibold bg-red-500 dark:bg-red-500 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                        Apply
                                    </button>

                                </div>
                            @endif
                        </div>
                        {{-- apply coupon code --}}


                        <div class="update-clear">
                            <div class="p-4">
                                <div class="p-4">
                                    <button
                                        wire:click.prevent="destroyAllCartItem"
                                        class="pl-8 pt-2 pr-8 pb-2 w-full text-center text-base font-semibold bg-gray-100 dark:bg-gray-500 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-103">
                                        Clear Shopping Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 pb-4">
                        <div class="mr-8 ml-8">
                            <button
                                wire:click.prevent="productCheckout"
                                class="w-full p-2 text-center text-base font-semibold bg-red-500 dark:bg-red-500 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                Check Out
                            </button>
                        </div>
                    </div>
                    <div class="pt-4 pb-4 w-full text-center">
                        <a
                            href="{{ route('products.product-shop') }}"
                            class="pl-8 pt-2 pr-8 pb-2 w-full text-center text-base font-semibold bg-green-500 dark:bg-green-700 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                            Countinue Shopping
                    </a>
                    </div>
                </div>
            @else
                <div class="item-center">
                    <h1 class="p-4 text-3xl">Your cart is empty</h1>
                    <p class="p-4">Add items to your cart</p>
                    <p class="p-4">
                        <a
                            href="{{ route('products.product-shop') }}"
                            class="p-2 bg-green-500"
                        >
                        Shop now</a>
                    </p>

                </div>
            @endif
            {{-- end product cart summary --}}
            {{-- save for later items --}}
            <div id="save-for-later-items" class="">
                <div class="py-2 w-full">
                    <h3 class="py-2 px-2 text-2xl"><span>{{ Cart::instance('saveForLater')->count() }}</span> Item(s) saved for later</h3>
                </div>
                @if(Cart::instance('saveForLater')->count() > 0)
                    <ul class="products-cart">
                        @foreach(Cart::instance('saveForLater')->content() as $item)
                            <li class="h-24 grid grid-cols-6 grid-flow-col items-center border-t">
                                <div class="relative overflow-hidden">
                                    <a
                                        class="c-card block bg-white dark:bg-gray-700 shadow-md hover:shadow-xl rounded-lg overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                        href="{{ route('products.product-detail', $item->model->SKU) }}"
                                    >
                                        <img
                                            class="w-16 p-2 object-fill"
                                            src="{{ env('APP_URL') . '/products-images/' . $item->model->product_banner_image }}"
                                            alt="{{ $item->model->name }}"
                                        >
                                    </a>
                                </div>
                                <div class="p-2 col-span-2">
                                    <a
                                        class="text-blue-500 hover:text-yellow-500 dark:text-blue-300 dark:hover:text-yellow-500"
                                        href="{{ route('products.product-detail', $item->model->SKU) }}"
                                    >
                                        {{ $item->model->name }}
                                    </a>
                                </div>
                                <div class="p-2">
                                    <p class="">Rs.{{ $item->model->regular_price }}</p>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <div class="flex flex-row h-10 w-32 rounded-lg relative bg-transparent">
                                            <button class="-mr-10" wire:click.prevent="decreaseCartQuantity('{{ $item->rowId }}')">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    aria-hidden="true"
                                                    focusable="false"
                                                    width="2em"
                                                    height="2em"
                                                    style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);"
                                                    preserveAspectRatio="xMidYMid meet"
                                                    viewBox="0 0 1024 1024">
                                                    <path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm192 472c0 4.4-3.6 8-8 8H328c-4.4 0-8-3.6-8-8v-48c0-4.4 3.6-8 8-8h368c4.4 0 8 3.6 8 8v48z" fill="#626262"/>
                                                </svg>
                                            </button>

                                            <input
                                                class="focus:outline-none text-center w-32 bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                                type="number"
                                                name="product-quatity"
                                                value="{{ $item->qty }}"
                                                data-max="120"
                                                pattern="[0-9]*"
                                                />

                                            <button class="-ml-10" wire:click.prevent="increaseCartQuantity('{{ $item->rowId }}')">
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
                                                    <g fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11s11-4.925 11-11S18.075 1 12 1zm1 15a1 1 0 1 1-2 0v-3H8a1 1 0 1 1 0-2h3V8a1 1 0 1 1 2 0v3h3a1 1 0 1 1 0 2h-3v3z" fill="#626262"/>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="py-1">
                                            <a
                                            wire:click.prevent="SwitchFromSaveForLaterToCart('{{ $item->rowId }}')"
                                            href="#"
                                            class="text-blue-500 hover:text-yellow-500 dark:text-blue-300 dark:hover:text-yellow-500 "
                                            >
                                                Move to cart
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2">Rs.{{ $item->subtotal }}</div>

                                <div class="p-2 grid grid-cols-1 place-items-end">
                                    <button wire:click.prevent="deleteFromSaveForLater('{{ $item->rowId }}')">
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
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="p-4">No item in the cart</p>
                @endif
            </div>
            {{-- end for later items --}}
        </div><!--end main content area-->
    </div><!--end container-->
</main><!--end main-->
