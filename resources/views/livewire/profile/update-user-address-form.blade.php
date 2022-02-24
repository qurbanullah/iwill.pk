<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Update Address') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add address to you profile.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
                <!-- Country -->
                <div>
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

                <!-- City -->
                {{-- <div class="pt-4">
                    <x-jet-label for="city" value="{{ __('City') }}" />
                    <select id="city" wire:model="cityId" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm dark:bg-gray-500">
                        <option value="Select City">Select City</option>
                        @foreach($cities as $city)
                            <option class="text-sm capitalize" value={{ $city->id }}>{{ Illuminate\Support\Str::ucfirst($city->name) }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="city" class="mt-2" />
                </div> --}}

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
                <div class="pt-4 col-span-6 sm:col-span-4">
                    <x-jet-label for="zipCode" value="{{ __('Zip Code') }}" />
                    <x-jet-input id="zipCode" type="text" class="mt-1 block w-full" wire:model.defer="zipCode" autocomplete="zipCode" />
                    <x-jet-input-error for="zipCode" class="mt-2" />
                </div>

                <!-- Postal Code -->
                <div class="pt-4 col-span-6 sm:col-span-4">
                    <x-jet-label for="postalCode" value="{{ __('Postal Code') }}" />
                    <x-jet-input id="postalCode" type="text" class="mt-1 block w-full" wire:model.defer="postalCode" autocomplete="postalCode" />
                    <x-jet-input-error for="postalCode" class="mt-2" />
                </div>

                <!-- Street -->
                <div class="pt-4 col-span-6 sm:col-span-4">
                    <x-jet-label for="street" value="{{ __('Street') }}" />
                    <x-jet-input id="street" type="text" class="mt-1 block w-full" wire:model.defer="street" autocomplete="street" />
                    <x-jet-input-error for="street" class="mt-2" />
                </div>

                <!-- House No -->
                <div class="pt-4 col-span-6 sm:col-span-4">
                    <x-jet-label for="houseNo" value="{{ __('House No') }}" />
                    <x-jet-input id="houseNo" type="text" class="mt-1 block w-full" wire:model.defer="houseNo" autocomplete="houseNo" />
                    <x-jet-input-error for="houseNo" class="mt-2" />
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
