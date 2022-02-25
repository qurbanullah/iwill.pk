<div>
    <div class="bg-gray-300 dark:bg-gray-900">
        <div class="py-12">
            <div class="max-w-7xl mx-auto bg-white dark:bg-gray-700 shadow-lg rounded-lg md:max-w-3xl">
                <div class="md:flex ">
                    <div class="w-full p-4 px-5 py-5">
                        <div class="flex flex-row">
                            <h2 class="text-3xl font-semibold">I</h2>
                            <h2 class="text-3xl font-semibold text-green-400">will</h2>
                        </div>
                        <div class="flex flex-row text-xs pt-6 pb-5">
                            <span class="font-bold">Products</span>
                            <small class="text-gray-400 ml-1">></small>
                            <span class="text-gray-400 ml-1">Shopping</span>
                            <small class="text-gray-400 ml-1">></small>
                            <span class="text-gray-400 ml-1">Payment</span>
                    </div>
                    {{-- Shipping Address --}}

                        <div>
                            <span class="font-semibold text-xl">Customer Information</span>
                            <div class="relative">
                                <!-- First Name -->
                                <div class="pt-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" type="text" name="email" class="mt-1 block w-full placeholder-gray-300" wire:model.defer="email" autocomplete="email" placeholder="email*" />
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-2 pb-4">
                                <!-- First Name -->
                                <div class="pt-4">
                                    <x-jet-label for="firstname" value="{{ __('First name') }}" />
                                    <x-jet-input id="firstname" type="text" name="firstname" class="mt-1 block w-full placeholder-gray-300" wire:model.defer="firstname" autocomplete="firstname" placeholder="First name*" />
                                    <x-jet-input-error for="firstname" class="mt-2" />
                                </div>

                                <!-- Last Name -->
                                <div class="pt-4">
                                    <x-jet-label for="lastname" value="{{ __('Last name') }}" />
                                    <x-jet-input id="lastname" type="text" name="lastname" class="mt-1 block w-full placeholder-gray-300" wire:model.defer="lastname" autocomplete="lastname" placeholder="Last name" />
                                    <x-jet-input-error for="lastname" class="mt-2" />
                                </div>
                                {{-- <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="First name*">
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Last name*"> --}}
                            </div>
                            {{-- <div>
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Company (optional)">
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Address*">
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Apartment, suite, etc. (optional)">
                            </div> --}}
                            <span class="font-semibold text-xl">Shipping Address</span>
                            <div class="grid md:grid-cols-3 md:gap-2">
                                <!-- Country -->
                                <div class="pt-4">
                                    <x-jet-label for="country" value="{{ __('Country') }}" />
                                    <select id="country" wire:model="countryId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                        <option value="Select Country">Select Country</option>
                                        <option value="166">Pakistan</option>
                                        {{-- @foreach($countries as $country)
                                            <option class="text-sm capitalize" value={{ $country->id }}>{{ Illuminate\Support\Str::ucfirst($country->name) }}</option>
                                        @endforeach --}}
                                    </select>
                                    <x-jet-input-error for="country" class="mt-2" />
                                </div>
                                <!-- State -->
                                <div class="pt-4">
                                    <x-jet-label for="state" value="{{ __('State / Privince') }}" />
                                    <select id="state" wire:model="stateId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                        <option value="Select State">Select State</option>
                                        <option value="2725">Azad Jammu and Kashmir</option>
                                        <option value="2723">Balochistan</option>
                                        <option value="2724">Federal Capital</option>
                                        <option value="2726">Gilgit-Baltistan</option>
                                        <option value="2727">Khyber Pakhtunkhwa</option>
                                        <option value="2728">Punjab</option>
                                        <option value="2729">Sindh</option>
                                        {{-- @foreach($states as $state)
                                            <option class="text-sm capitalize" value={{ $state->id }}>{{ Illuminate\Support\Str::ucfirst($state->name) }}</option>
                                        @endforeach --}}
                                    </select>
                                    <x-jet-input-error for="state" class="mt-2" />
                                </div>
                                <!-- District -->
                                <div class="pt-4">
                                    <x-jet-label for="district" value="{{ __('District') }}" />
                                    <select id="city" wire:model="districtId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                        <option value="Select District">Select District</option>
                                        @foreach($districts as $district)
                                            <option class="text-sm capitalize" value={{ $district->id }}>{{ Illuminate\Support\Str::ucfirst($district->district) }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="district" class="mt-2" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3 md:gap-2">
                                <!-- Tehsil -->
                                <div class="pt-4">
                                    <x-jet-label for="tehsil" value="{{ __('Tehsil') }}" />
                                    <select id="tehsil" wire:model="tehsilId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                        <option value="Select Tehsil">Select Tehsil</option>
                                        @foreach($tehsils as $tehsil)
                                            <option class="text-sm capitalize" value={{ $tehsil->id }}>{{ Illuminate\Support\Str::ucfirst($tehsil->tehsil) }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="tehsil" class="mt-2" />
                                </div>

                                <!-- Zip Code -->
                                <div class="pt-4">
                                    <x-jet-label for="zipCode" value="{{ __('Zip Code') }}" />
                                    <x-jet-input id="zipCode" type="text" class="mt-1 block w-full" wire:model.defer="zipCode" autocomplete="zipCode" />
                                    <x-jet-input-error for="zipCode" class="mt-2" />
                                </div>

                                <!-- Postal Code -->
                                <div class="pt-4">
                                    <x-jet-label for="postalCode" value="{{ __('Postal Code') }}" />
                                    <x-jet-input id="postalCode" type="text" class="mt-1 block w-full" wire:model.defer="postalCode" autocomplete="postalCode" />
                                    <x-jet-input-error for="postalCode" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <div class="grid md:grid-cols-2 md:gap-2">
                                    <!-- Street -->
                                    <div class="pt-4">
                                        <x-jet-label for="street" value="{{ __('Street / Phase / Block') }}" />
                                        <x-jet-input id="street" type="text" class="mt-1 block w-full" wire:model.defer="street" autocomplete="street" />
                                        <x-jet-input-error for="street" class="mt-2" />
                                    </div>

                                    <!-- House No -->
                                    <div class="pt-4">
                                        <x-jet-label for="houseNo" value="{{ __('House No') }}" />
                                        <x-jet-input id="houseNo" type="text" class="mt-1 block w-full" wire:model.defer="houseNo" autocomplete="houseNo" />
                                        <x-jet-input-error for="houseNo" class="mt-2" />
                                    </div>
                                </div>
                                <!-- Address1 -->
                                <div class="pt-4 col-span-6 sm:col-span-4">
                                    <x-jet-label for="address1" value="{{ __('Extra Infrmation') }}" />
                                    <x-jet-input id="address1" type="text" class="mt-1 block w-full" wire:model.defer="address1" autocomplete="address1" />
                                    <x-jet-input-error for="address1" class="mt-2" />
                                </div>

                                <!-- Address2 -->
                                <div class="pt-4 col-span-6 sm:col-span-4">
                                    <x-jet-label for="address2" value="{{ __('Extra Infrmation') }}" />
                                    <x-jet-input id="address2" type="text" class="mt-1 block w-full" wire:model.defer="address2" autocomplete="address2" />
                                    <x-jet-input-error for="address2" class="mt-2" />
                                </div>
                                <!-- Mobile No -->
                                <div class="pt-4 col-span-6 sm:col-span-4">
                                    <x-jet-label for="mobileNo" value="{{ __('Mobile No') }}" />
                                    <x-jet-input id="mobileNo" type="text" class="mt-1 block w-full" wire:model.defer="mobileNo" autocomplete="mobileNo" />
                                    <x-jet-input-error for="mobileNo" class="mt-2" />
                                </div>
                                {{-- <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Country*">
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Phone Number*"> --}}
                            </div>
                        </div>


                    {{-- Shipping to different Address --}}
                    @if($shipToDiffrentAddress)
                        <div class="pt-8">
                            <span class="font-semibold text-xl">Ship product to different Address</span>
                            <div class="relative">
                                <!-- First Name -->
                                <div class="pt-4">
                                    <x-jet-label for="_email" value="{{ __('Email') }}" />
                                    <x-jet-input id="_email" type="text" name="_email" class="mt-1 block w-full placeholder-gray-300" wire:model.defer="_email" autocomplete="_email" placeholder="email*" />
                                    <x-jet-input-error for="_email" class="mt-2" />
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-2 pb-4">
                                <!-- First Name -->
                                <div class="pt-4">
                                    <x-jet-label for="_firstname" value="{{ __('First name') }}" />
                                    <x-jet-input id="_firstname" type="text" name="_firstname" class="mt-1 block w-full placeholder-gray-300" wire:model.defer="_firstname" autocomplete="_firstname" placeholder="First name*" />
                                    <x-jet-input-error for="_firstname" class="mt-2" />
                                </div>

                                <!-- Last Name -->
                                <div class="pt-4">
                                    <x-jet-label for="_lastname" value="{{ __('Last name') }}" />
                                    <x-jet-input id="_lastname" type="text" name="lastname" class="mt-1 block w-full placeholder-gray-300" wire:model.defer="_lastname" autocomplete="_lastname" placeholder="Last name" />
                                    <x-jet-input-error for="_lastname" class="mt-2" />
                                </div>
                                {{-- <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="First name*">
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Last name*"> --}}
                            </div>
                            {{-- <div>
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Company (optional)">
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Address*">
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Apartment, suite, etc. (optional)">
                            </div> --}}
                            <span class="font-semibold text-xl">Shipping Address</span>
                            <div class="grid md:grid-cols-3 md:gap-2">
                                <!-- Country -->
                                <div class="pt-4">
                                    <x-jet-label for="_country" value="{{ __('Country') }}" />
                                    <select id="_country" wire:model="_countryId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                        <option value="Select Country">Select Country</option>
                                        <option value="166">Pakistan</option>
                                        {{-- @foreach($countries as $country)
                                            <option class="text-sm capitalize" value={{ $country->id }}>{{ Illuminate\Support\Str::ucfirst($country->name) }}</option>
                                        @endforeach --}}
                                    </select>
                                    <x-jet-input-error for="_countryId" class="mt-2" />
                                </div>
                                <!-- State -->
                                <div class="pt-4">
                                    <x-jet-label for="_state" value="{{ __('State / Privince') }}" />
                                    <select id="_state" wire:model="_stateId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                        <option value="Select State">Select State</option>
                                        <option value="2725">Azad Jammu and Kashmir</option>
                                        <option value="2723">Balochistan</option>
                                        <option value="2724">Federal Capital</option>
                                        <option value="2726">Gilgit-Baltistan</option>
                                        <option value="2727">Khyber Pakhtunkhwa</option>
                                        <option value="2728">Punjab</option>
                                        <option value="2729">Sindh</option>
                                        {{-- @foreach($states as $state)
                                            <option class="text-sm capitalize" value={{ $state->id }}>{{ Illuminate\Support\Str::ucfirst($state->name) }}</option>
                                        @endforeach --}}
                                    </select>
                                    <x-jet-input-error for="_stateId" class="mt-2" />
                                </div>
                                <!-- District -->
                                <div class="pt-4">
                                    <x-jet-label for="_district" value="{{ __('District') }}" />
                                    <select id="_city" wire:model="_districtId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                        <option value="Select District">Select District</option>
                                        @foreach($districts as $district)
                                            <option class="text-sm capitalize" value={{ $district->id }}>{{ Illuminate\Support\Str::ucfirst($district->district) }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="_districtId" class="mt-2" />
                                </div>
                            </div>
                            <div class="grid md:grid-cols-3 md:gap-2">
                                <!-- Tehsil -->
                                <div class="pt-4">
                                    <x-jet-label for="_tehsil" value="{{ __('Tehsil') }}" />
                                    <select id="_tehsil" wire:model="_tehsilId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                                        <option value="Select Tehsil">Select Tehsil</option>
                                        @foreach($tehsils as $tehsil)
                                            <option class="text-sm capitalize" value={{ $tehsil->id }}>{{ Illuminate\Support\Str::ucfirst($tehsil->tehsil) }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="_tehsilId" class="mt-2" />
                                </div>

                                <!-- Zip Code -->
                                <div class="pt-4">
                                    <x-jet-label for="_zipCode" value="{{ __('Zip Code') }}" />
                                    <x-jet-input id="_zipCode" type="text" class="mt-1 block w-full" wire:model.defer="_zipCode" autocomplete="_zipCode" />
                                    <x-jet-input-error for="_zipCode" class="mt-2" />
                                </div>

                                <!-- Postal Code -->
                                <div class="pt-4">
                                    <x-jet-label for="_postalCode" value="{{ __('Postal Code') }}" />
                                    <x-jet-input id="_postalCode" type="text" class="mt-1 block w-full" wire:model.defer="_postalCode" autocomplete="_postalCode" />
                                    <x-jet-input-error for="_postalCode" class="mt-2" />
                                </div>
                            </div>
                            <div>
                                <div class="grid md:grid-cols-2 md:gap-2">
                                    <!-- Street -->
                                    <div class="pt-4">
                                        <x-jet-label for="_street" value="{{ __('Street / Phase / Block') }}" />
                                        <x-jet-input id="_street" type="text" class="mt-1 block w-full" wire:model.defer="_street" autocomplete="_street" />
                                        <x-jet-input-error for="_street" class="mt-2" />
                                    </div>

                                    <!-- House No -->
                                    <div class="pt-4">
                                        <x-jet-label for="_houseNo" value="{{ __('House No') }}" />
                                        <x-jet-input id="_houseNo" type="text" class="mt-1 block w-full" wire:model.defer="_houseNo" autocomplete="_houseNo" />
                                        <x-jet-input-error for="_houseNo" class="mt-2" />
                                    </div>
                                </div>
                                <!-- Address1 -->
                                <div class="pt-4 col-span-6 sm:col-span-4">
                                    <x-jet-label for="_address1" value="{{ __('Extra Infrmation') }}" />
                                    <x-jet-input id="_address1" type="text" class="mt-1 block w-full" wire:model.defer="_address1" autocomplete="_address1" />
                                    <x-jet-input-error for="_address1" class="mt-2" />
                                </div>

                                <!-- Address2 -->
                                <div class="pt-4 col-span-6 sm:col-span-4">
                                    <x-jet-label for="_address2" value="{{ __('Extra Infrmation') }}" />
                                    <x-jet-input id="_address2" type="text" class="mt-1 block w-full" wire:model.defer="_address2" autocomplete="_address2" />
                                    <x-jet-input-error for="_address2" class="mt-2" />
                                </div>
                                <!-- Mobile No -->
                                <div class="pt-4 col-span-6 sm:col-span-4">
                                    <x-jet-label for="_mobileNo" value="{{ __('Mobile No') }}" />
                                    <x-jet-input id="_mobileNo" type="text" class="mt-1 block w-full" wire:model.defer="_mobileNo" autocomplete="_mobileNo" />
                                    <x-jet-input-error for="_mobileNo" class="mt-2" />
                                </div>
                                {{-- <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Country*">
                                <input type="text" name="mail" class="border rounded h-10 w-full focus:outline-none focus:border-green-200 px-2 mt-2 text-sm" placeholder="Phone Number*"> --}}
                            </div>
                        </div>
                    @endif
                    <div class="pt-4">
                        <label class="pr-2">Ship to different Address</label>
                        <input class="pl-2" name="have-code" id="have-code" value="1" type="checkbox" wire:model="shipToDiffrentAddress">
                    </div>
                    <div>
                        <div class="pt-4">
                            <label class="pr-2">Cash On Delivery</label>
                            <span>Order now Pay on Delivery</span>
                            <input class="pl-2" name="have-code" id="have-code" value="cod" type="radio" wire:model="paymentMode">
                        </div>
                        <div class="pt-4">
                            <label class="pr-2">Debit / Credit Card</label>
                            <span>Order now Pay via Debit / Credit card</span>
                            <input class="pl-2" name="have-code" id="have-code" value="card" type="radio" wire:model="paymentMode">
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-2">
                        <a class="h-12 w-24 text-blue-500 text-sm font-medium" href="{{ route('products.product-cart') }}">Return to cart</a>
                        <button type="button" class="h-12 w-48 rounded font-medium text-base bg-blue-500 text-white" wire:click.prevent="placeOrder">Continue to Shipping</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
