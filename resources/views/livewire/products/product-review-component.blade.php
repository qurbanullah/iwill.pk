<div class="p-2 max-w-3xl mx-auto">
    <div class="">
        <div class="">
            @if($reviews)
                @foreach($reviews as $review)
                    <div class="panel-body">
                        <div class="list-group border dark:border-indigo-400 border-indigo-200">
                            <div class="p-2 bg-indigo-200 dark:bg-indigo-400">
                                <div class="inline">
                                    {{ $review->reviewedBy->name}} reviewed on
                                </div>
                                <div class="inline">
                                    {{ $review->created_at->format('M d,Y \a\t h:i a') }}
                                </div>
                            </div>
                            <div class="p-2 list-group-item">
                                {!! $review->content !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div id="" class="p-4 list-group-item">
                    <p>Be the first to review.</p>
                </div>
            @endif
        </div>
        <div>
            @if(Auth::guest())
                <div class="p-4">
                    <p><a href="{{ route('login') }}" class="text-gray-800 dark:text-yellow-500 underline">Login</a> to review</p>
                </div>
            @else
                <div id="" class="">
                    <div class="mt-4">
                        <x-jet-label for="content" value="{{ __('Leave a review') }}" class="text-lg dark:text-green-200" />
                        <div class="rounded-md shadow-sm">
                            <div class="mt-1 bg-white dark:bg-gray-500 dark:text-white">
                                <div class="" wire:ignore>
                                    <trix-editor
                                        name="content"
                                        class="trix-content trix-past"
                                        x-ref="trix"
                                        wire:model.debounce.800ms="content"
                                        wire:key="trix-content-unique-key"
                                        trix-attachment-add="$event.attachment"
                                        style="height: 200px !important; max-height: 200px !important;"
                                    ></trix-editor>
                                </div>
                            </div>
                        </div>
                        @error('content') <span class="error text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="pt-8">
                        <div class="inline">
                            <x-jet-button class="dark:bg-green-500 dark:text-white" wire:click="store" wire:loading.attr="disabled">
                                {{ __('Post') }}
                            </x-jet-danger-button>
                        </div>
                        <div class="ml-12 inline text-green-500">
                            @if (session()->has('message'))
                                {{ session('message') }}
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
