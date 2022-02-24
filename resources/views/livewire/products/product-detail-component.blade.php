<x-slot name="header">
    <div class="mx-auto">
        <h1 class="text-base font-semibold">Product Detail</h1>
    </div>
</x-slot>
<div class="m-2 dark:bg-gray-900 shadow-xl">
    <div class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-100">
        <div class="sm:flex flex-nowrap sm:gape-2 shadow-xl sm:rounded-lg">
            <div class="w-full sm:w-5/6">
                <div class="product-contents">
                    @if($product)
                        @section('title', 'Relyface: ' . $product->name)
                        <div class="mt-2 sm:flex">
                            <div id="product_banner_image" class="h-full w-full sm:w-7/12">
                                <div>
                                    @if (!empty($product->product_banner_image))
                                        @if(!empty($this->bannerImage))
                                            <img class="p-2 object-cover object-center h-96 w-full" src="{{ env('APP_URL') . '/products-images/' . $product->product_banner_image }}" alt="Banner Image">
                                        @else
                                            <img class="p-2 object-cover object-center h-96 w-full" src="{{ env('APP_URL') . '/products-images/' . $this->imageToBePreviewd }}" alt="Banner Image">
                                        @endif
                                    @else
                                        <img class="p-2 object-cover object-center h-96 w-full" src="{{ env('APP_URL') . '/products-images/' . $this->imageToBePreviewd }}" alt="Banner Image">
                                    @endif
                                </div>
                                <div class="p-2 w-full">
                                    <ul class="flex">
                                        @foreach (json_decode($product->product_images) as $image)
                                            <li class="">
                                                <button wire:click='imagePreview("{{ $image }}")'>
                                                    <img class="p-2 object-cover object-center h-12 w-16" src="{{ env('APP_URL') . '/products-images/' . $image }}" alt="Banner Image">
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                    {{-- <ul>
                                        <li>Service Videos</li>
                                    </ul> --}}
                                </div>
                                <div>
                                    {{-- <div class="hidden md:flex items-top justify-center sm:items-center">
                                        <div class="max-w-xl">
                                            <div id="secondary-slider" class="splide">
                                                <div class="splide__track">
                                                    <ul class="splide__list">
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t01.jpg') }}">
                                                        </li>
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t02.jpg') }}">
                                                        </li>
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t03.jpg') }}">
                                                        </li>
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t04.jpg') }}">
                                                        </li>
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t05.jpg') }}">
                                                        </li>
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t06.jpg') }}">
                                                        </li>
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t07.jpg') }}">
                                                        </li>
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t08.jpg') }}">
                                                        </li>
                                                        <li class="splide__slide">
                                                            <img src="{{ asset('images/t09.jpg') }}">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <script>
                                                document.addEventListener( 'DOMContentLoaded', function () {
                                                    new Splide( '#secondary-slider', {
                                                        fixedWidth : 100,
                                                        height     : 60,
                                                        gap        : 10,
                                                        rewind     : true,
                                                        cover      : true,
                                                        pagination : false,
                                                    } ).mount();
                                                } );
                                            </script>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                            <div class="w-full sm:w-5/12 p-4 text-xl">
                                @if(!empty($reviewCount))
                                    <p class="p-2">{{ $reviewCount }} Reviews</p>
                                @else
                                    <p class="p-2">0 Review</p>
                                @endif

                                {{-- livewire product review componenet --}}
                                <div id="product-rating" class="">
                                    <div>
                                        @livewire('products.product-rating-component', ['id' => $product->id])
                                    </div>
                                </div>
                                <h2 class="p-2 pb-2 font-bold border-b">{{ ucwords($product->name) }}</h2>
                                <p class="pt-6 pl-2 pb-6 text-sm">{!! $product->short_description !!}</p>
                                <div class="pl-2 mt-3 flex items-center">
                                    <span class="text-sm font-semibold">Rs.</span>&nbsp;
                                    <span class="font-bold text-xl">{{ $product->regular_price }}</span>&nbsp;
                                </div>
                                <div class="pl-2 mt-3 flex items-center">
                                    <span class="text-sm font-semibold">Availability:</span>&nbsp;
                                    <span class="font-bold text-xl">
                                        @if($product->stock_status == true)
                                            <p class="text-sm text-green-500">In Stock</p>
                                        @else
                                            <p class="text-sm text-red-500">Out of Stock</p>
                                        @endif
                                    </span>
                                </div>
                                {{-- <div class="pl-2 mt-3 flex items-center">
                                    <span class="text-sm font-semibold">Quantity:</span>&nbsp;
                                    <div class="quantity-input">
                                        <input class="w-32 dark:bg-gray-500" type="number" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" >

                                        <a class="btn btn-reduce" href="#"></a>
                                        <a class="btn btn-increase" href="#"></a>
                                    </div>
                                </div> --}}

                                <div class="p-2 flex">
                                    <div>
                                        <label for="product-quatity" class="w-full text-sm font-semibold">Quantity:</label>&nbsp;
                                    </div>
                                    <div class="p-2">
                                        <div class="flex flex-row h-10 w-32 rounded-lg relative bg-transparent">
                                            <button class="-mr-10" wire:click.prevent="decreaseProductQuantity">
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
                                                wire:model="qty"
                                                class="outline-none focus:outline-none text-center w-32 bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none"
                                                type="number"
                                                name="product-quatity"
                                                value="1"
                                                data-max="120"
                                                pattern="[0-9]*"
                                                />

                                            <button class="-ml-10" wire:click.prevent="increaseProductQuantity">
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
                                    </div>
                                </div>

                                {{-- <div class="custom-number-input w-32 pl-2 flex items-center pt-2">
                                    <label for="product-quatity" class="w-full text-sm font-semibold">Quantity:</label>&nbsp;
                                    <div class="flex flex-row h-10 w-full rounded-lg relative bg-transparent">
                                        <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                                            <span class="m-auto text-2xl font-thin">−</span>
                                        </button>
                                        <input class="outline-none focus:outline-none text-center w-full bg-gray-300 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-700  outline-none" type="number" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" />
                                        <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                                            <span class="m-auto text-2xl font-thin">+</span>
                                        </button>
                                    </div>
                                </div> --}}

                                  <script>
                                    function decrement(e) {
                                      const btn = e.target.parentNode.parentElement.querySelector(
                                        'button[data-action="decrement"]'
                                      );
                                      const target = btn.nextElementSibling;
                                      let value = Number(target.value);
                                      value--;
                                      target.value = value;
                                    }

                                    function increment(e) {
                                      const btn = e.target.parentNode.parentElement.querySelector(
                                        'button[data-action="decrement"]'
                                      );
                                      const target = btn.nextElementSibling;
                                      let value = Number(target.value);
                                      value++;
                                      target.value = value;
                                    }

                                    const decrementButtons = document.querySelectorAll(
                                      `button[data-action="decrement"]`
                                    );

                                    const incrementButtons = document.querySelectorAll(
                                      `button[data-action="increment"]`
                                    );

                                    decrementButtons.forEach(btn => {
                                      btn.addEventListener("click", decrement);
                                    });

                                    incrementButtons.forEach(btn => {
                                      btn.addEventListener("click", increment);
                                    });
                                  </script>

                                <div class="pt-6 w-full flex justify-center">
                                    <a href="#"
                                        wire:click.prevent="AddProductToCart('{{ $product->id }}', '{{ $product->name }}', '{{ $product->regular_price }}')"
                                        class="p-2 w-full text-center text-base font-semibold bg-gray-100 dark:bg-gray-600 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                        Add To Cart
                                    </a>
                                </div>

                                <div class="flex w-full justify-center">
                                    <div class="p-6 flex justify-center">
                                        <button
                                            wire:click.prevent="AddProductToCart('{{ $product->id }}', '{{ $product->name }}', '{{ $product->regular_price }}')"
                                            class="pl-6 pt-2 pr-6 pb-2 w-full text-center text-base font-semibold bg-blue-500 hover:bg-purple-700 dark:hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                            Add To Cart
                                        </button>
                                    </div>
                                    <div class="p-6 flex justify-center">
                                        <button
                                            class="pl-6 pr-6 flex justify-center items-center font-semibold w-full bg-green-600 hover:bg-purple-700 dark:hover:bg-purple-700 focus:ring-opacity-50 overflow-hidden transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105"
                                            wire:click="phoneNoShowModal({{ $product->id }})">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                aria-hidden="true"
                                                role="img"
                                                width="2em"
                                                height="2em"
                                                preserveAspectRatio="xMidYMid meet"
                                                viewBox="0 0 24 24">
                                                <path d="M20 10.999h2C22 5.869 18.127 2 12.99 2v2C17.052 4 20 6.943 20 10.999z" fill="currentColor"/><path d="M13 8c2.103 0 3 .897 3 3h2c0-3.225-1.775-5-5-5v2zm3.422 5.443a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66c-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a1 1 0 0 0-.086-1.391l-4.064-3.696z" fill="currentColor"/>
                                            </svg>
                                            <span class="pl-4">Call</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Product Advanced Information --}}
                        {{-- <div class="w-full overflow-x-hidden border-t flex flex-col">
                            <main class="w-full flex-grow p-6">
                                <h1 class="text-3xl pb-6">Tabbed Content</h1>

                                <div class="w-full mt-6" x-data="{ openTab: 1 }">
                                    <div>
                                        <ul class="flex border-b">
                                            <li class="-mb-px mr-1" @click="openTab = 1">
                                                <a :class="openTab === 1 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 text-base font-semibold uppercase" href="#">Discription</a>
                                            </li>
                                            <li class="mr-1" @click="openTab = 2">
                                                <a :class="openTab === 2 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 text-base font-semibold uppercase" href="#">Additional Information</a>
                                            </li>
                                            <li class="mr-1" @click="openTab = 3">
                                                <a :class="openTab === 3 ? 'border-l border-t border-r rounded-t text-blue-700 font-semibold' : 'text-blue-500 hover:text-blue-800'" class="bg-white inline-block py-2 px-4 text-base font-semibold uppercase" href="#">Review</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pt-6">
                                        <div id="" class="" x-show="openTab === 1">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus ligula at condimentum sagittis. Maecenas velit libero, fermentum a leo quis, pretium egestas risus. Proin tempus sem magna, vitae convallis purus rhoncus non. Aenean tristique congue metus in lobortis. Nullam nisi leo, luctus in sapien eget, accumsan mattis leo. Morbi magna dolor, dapibus ut ligula eget, commodo venenatis risus. Nunc quis dignissim velit. Donec nec dapibus ligula. Etiam quis libero ultrices, semper arcu id, suscipit purus. Phasellus eu arcu tincidunt dui pellentesque feugiat et at risus. In hendrerit laoreet ante ac imperdiet. Nam tortor urna, laoreet in malesuada quis, pretium cursus dolor.
                                        </div>
                                        <div id="" class="" x-show="openTab === 2">
                                            Curabitur at lacinia felis. Curabitur elit ante, efficitur molestie iaculis non, blandit dictum dui. Fusce ac faucibus lorem, in aliquet metus. Praesent bibendum justo vitae ante imperdiet, sit amet posuere tortor tincidunt. Nam a arcu eros. In vitae augue tempus, ullamcorper lectus ut, egestas erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean imperdiet eget sapien nec consequat. Etiam imperdiet diam ac mattis gravida.
                                        </div>
                                        <div id="" class="" x-show="openTab === 3">
                                            Duis imperdiet ullamcorper nibh, sed euismod dolor facilisis sit amet. Etiam quis cursus lorem. Vivamus euismod accumsan neque lobortis tempus. Praesent nec lacinia odio, a dictum risus. Sed eget dictum turpis, vitae iaculis orci. Vivamus laoreet consequat velit, non viverra diam pulvinar a. Aliquam bibendum ligula lacus, ac convallis ipsum hendrerit ut. Suspendisse rutrum dui libero, non aliquam lectus lobortis at. Donec gravida finibus sollicitudin. Nulla ut metus finibus purus vehicula porttitor. Fusce id sem non nisl pulvinar scelerisque.
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </div>  --}}
                        {{-- End Product Advanced Information --}}

                        <div class="p-4">
                            <div id="service-description" class="p-4">
                                <h2 class="text-2xl">Product Description</h2>
                                <div class="p-4">
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div id="service-comparison" class="p-4">
                                <h2 class="text-2xl">Similar Services</h2>
                            </div>
                            <div id="service-questions" class="p-4">
                                <h2 class="text-2xl">Customer questions & answers</h2>
                            </div>
                            <div id="service-reviews" class="p-4">
                                @livewire('products.product-review-component', ['id' => $product->id])
                            </div>
                        </div>

                        {{-- Related Products --}}
                        <div class="hidden sm:block">
                            <div class="w-full pl-6 pt-3 pb-3 bg-pink-700">
                                <h3 class="font-semibold uppercase">Related Products</h3>
                            </div>
                            <div class="sm-flex">

                                These are related product
                            </div>
                        </div> {{-- End Related Products --}}

                    @else
                        404 error
                    @endif
                </div>
            </div>
            <div class="w-1/6 hidden sm:inline bg-gray-300 dark:bg-gray-800">
                <div class="p-1">
					<div class="pb-4">
						<div class="">
							<ul class="">

								<li class="pb-4">
									<a class="link-to-service" href="#">
										<i class="fa fa-truck" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Free Shipping</b>
											<span class="subtitle">On Oder Over $99</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="pb-4">
									<a class="link-to-service" href="#">
										<i class="fa fa-gift" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Special Offer</b>
											<span class="subtitle">Get a gift!</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>

								<li class="pb-4">
									<a class="link-to-service" href="#">
										<i class="fa fa-reply" aria-hidden="true"></i>
										<div class="right-content">
											<b class="title">Order Return</b>
											<span class="subtitle">Return within 7 days</span>
											<p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div><!-- Categories widget-->
                    {{-- <div class="pt-4">
						<h2 class="font-semibold uppercase border-b">Popular Products</h2>
						<div class="">
							<ul class="products">
								<li class="pb-4 pt-4">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="assets/images/products/digital_01.jpg" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="text-sm"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
											<div class="wrap-price"><span class="font-semibold">$168.00</span></div>
										</div>
									</div>
								</li>

								<li class="pb-4">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="assets/images/products/digital_17.jpg" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="text-sm"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
											<div class="wrap-price"><span class="font-semibold">$168.00</span></div>
										</div>
									</div>
								</li>

								<li class="pb-4">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="text-sm"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
											<div class="wrap-price"><span class="font-semibold">$168.00</span></div>
										</div>
									</div>
								</li>

								<li class="pb-4">
									<div class="product product-widget-style">
										<div class="thumbnnail">
											<a href="detail.html" title="Radiant-360 R6 Wireless Omnidirectional Speaker [White]">
												<figure><img src="assets/images/products/digital_20.jpg" alt=""></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="text-sm"><span>Radiant-360 R6 Wireless Omnidirectional Speaker...</span></a>
											<div class="wrap-price"><span class="font-semibold">$168.00</span></div>
										</div>
									</div>
								</li>

							</ul>
						</div>
					</div> --}}

            </div>
        </div>
    </div>
    {{-- Related Products --}}
</div>
<div class="hidden sm:flex sm:w-full">
    <div class="w-full pl-6 pt-3 pb-3 bg-pink-700">
        <div class="wrap-function-info">
            <div class="sm:flex gap-16 items-center justify-center">
                <div class="wrap-left-info">
                    <h4 class="fc-name">Free Shipping</h4>
                    <p class="fc-desc">Free On Oder Over $99</p>
                </div>

                <div class="wrap-left-info">
                    <h4 class="fc-name">Guarantee</h4>
                    <p class="fc-desc">30 Days Money Back</p>
                </div>

                <div class="wrap-left-info">
                    <h4 class="fc-name">Safe Payment</h4>
                    <p class="fc-desc">Safe your online payment</p>
                </div>

                <div class="wrap-left-info">
                    <h4 class="fc-name">Online Suport</h4>
                    <p class="fc-desc">We Have Support 24/7</p>
                </div>
            </div>
        </div>
    </div>
    {{-- The Delete Modal --}}
    <div>
        <x-jet-dialog-modal wire:model="modalPhoneNoVisible">
            <x-slot name="title">
                {{ __('Contact Us') }}
            </x-slot>

            <x-slot name="content">
                <div class="p-4">
                    @if($this->productVendorPhoneNo)
                        <div class="flex">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true"
                                role="img"
                                width="2em"
                                height="2em"
                                preserveAspectRatio="xMidYMid meet"
                                viewBox="0 0 1200 1200">
                                <path d="M600 0C268.629 0 0 268.629 0 600s268.629 600 600 600s600-268.629 600-600S931.371 0 600 0zM384.375 238.33c12.362-.729 23.536 6.66 32.007 19.775l82.031 155.566c8.637 18.434 3.729 38.172-9.155 51.343l-37.573 37.573c-2.319 3.178-3.845 6.757-3.882 10.693c14.409 55.775 58.117 107.223 96.681 142.603c38.562 35.38 80.009 83.281 133.812 94.629c6.65 1.855 14.797 2.52 19.556-1.903l43.652-44.458c15.068-11.421 36.866-16.956 52.954-7.617h.732l148.021 87.378c21.728 13.619 23.979 39.944 8.423 55.957L849.683 941.016c-15.056 15.44-35.058 20.631-54.491 20.654c-85.948-2.575-167.158-44.759-233.862-88.11c-109.49-79.653-209.923-178.446-272.975-297.803c-24.182-50.05-52.589-113.91-49.878-169.774c.242-21.016 5.928-41.605 20.728-55.151l101.953-101.953c7.942-6.758 15.799-10.111 23.217-10.549z" fill="currentColor"/>
                            </svg>
                            <p class="pl-4 text-xl">{{ $this->productVendorPhoneNo }}</p>
                        </div>
                    @else
                        <p class="pl-4 text-base">Sorry! Phone No not available</p>
                    @endif

                    @if($this->productVendorMobileNo)
                    <div class="flex pt-8">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink"
                            aria-hidden="true"
                            role="img"
                            width="2em"
                            height="2em"
                            preserveAspectRatio="xMidYMid meet"
                            viewBox="0 0 1200 1200">
                            <path d="M600 0C268.629 0 0 268.629 0 600s268.629 600 600 600s600-268.629 600-600S931.371 0 600 0zM384.375 238.33c12.362-.729 23.536 6.66 32.007 19.775l82.031 155.566c8.637 18.434 3.729 38.172-9.155 51.343l-37.573 37.573c-2.319 3.178-3.845 6.757-3.882 10.693c14.409 55.775 58.117 107.223 96.681 142.603c38.562 35.38 80.009 83.281 133.812 94.629c6.65 1.855 14.797 2.52 19.556-1.903l43.652-44.458c15.068-11.421 36.866-16.956 52.954-7.617h.732l148.021 87.378c21.728 13.619 23.979 39.944 8.423 55.957L849.683 941.016c-15.056 15.44-35.058 20.631-54.491 20.654c-85.948-2.575-167.158-44.759-233.862-88.11c-109.49-79.653-209.923-178.446-272.975-297.803c-24.182-50.05-52.589-113.91-49.878-169.774c.242-21.016 5.928-41.605 20.728-55.151l101.953-101.953c7.942-6.758 15.799-10.111 23.217-10.549z" fill="currentColor"/>
                        </svg>
                            <p class="pl-4 text-xl">{{ $this->productVendorMobileNo }}</p>
                        </div>
                    @else
                        <p class="pl-4 text-base">Mobile! Phone No not available</p>
                    @endif
                </div>
                {{ __('Please Quote Relyface when calling us') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalPhoneNoVisible')" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div> {{-- End Related Products --}}
