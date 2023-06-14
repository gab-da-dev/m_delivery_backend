<label for="{{ $name }}" value="{{ __($label) }}" />

<div class="flex flex-col">

@if(is_array($array))
    @foreach($array + [count($array) => ''] as $index => $item)
    
        <div class="flex flex-row mt-4">
            <div wire:ignore class="my-auto pr-4">
                <button wire:click="remove({{$index}})" type="button"
                    class="flex items-center uppercase tracking-wide bg-gray-300 text-white hover:bg-red-600 rounded-full focus:outline-none text-xs space-x-1">
                    <svg class="h-5 w-5 stroke-current" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </button>
            </div>
            <input type="text" wire:model="{{$name}}.{{$index}}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" />
            <input-error for="{{$name}}.{{$index}}" class="mt-2" />
        </div>
    
    @endforeach
@endif
</div>
