<x-jet-form-section submit="store">
    <x-slot name="title">
        {{ __('Update Gender') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add your gender to be searchable.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4 text-base">
            <p class="pb-4">Please select your gender:</p>
            @if(!empty($data->gender))
                <input wire:model="gender" class="p-2" type="radio" id="male" name="gender"  value="male" {{ $data->gender == 'male' ? 'checked' : '' }} />
                <label class="p-2" for="male">{{ __('Male') }}</label><br>

                <input wire:model="gender" class="p-2" type="radio" id="female" name="gender" value="female" {{ $data->gender == 'female' ? 'checked' : '' }} />
                <label class="p-2" for="female">{{ __('Female') }}</label><br>

                <input wire:model="gender" class="p-2" type="radio" id="other" name="gender" value="other" {{ $data->gender == 'other' ? 'checked' : '' }} />
                <label class="p-2" for="other">{{ __('Other') }}</label>
            @else
                <input wire:model="gender" class="p-2" type="radio" id="male" name="gender"  value="male" />
                <label class="p-2" for="male">{{ __('Male') }}</label><br>

                <input wire:model="gender" class="p-2" type="radio" id="female" name="gender" value="female" />
                <label class="p-2" for="female">{{ __('Female') }}</label><br>

                <input wire:model="gender" class="p-2" type="radio" id="other" name="gender" value="other" />
                <label class="p-2" for="other">{{ __('Other') }}</label>
            @endif
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
