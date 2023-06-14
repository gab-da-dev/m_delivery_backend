<label for="{{ $name }}" value="{{ __($label) }}" />

<div class="flex flex-col">
    @foreach($array as $index => $item)
    <div class="flex flex-col mt-4" wire:key="order-{{ $index }}">
        <div wire:ignore class="my-auto pr-4">
            
        </div>
        <div class="mt-2">
        <label class="block text-sm text-gray-600" for="name">Name</label>
            <input wire:model="order.order.{{$index}}.name" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="order.order.{{$index}}.quantity.{{$index}}"
                name="order.order.quantity.{{$index}}" type="text" placeholder="" aria-label="Name" disabled>
            
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="name">Quantity</label>
            <input wire:model="order.order.{{$index}}.quantity" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="order.order.{{$index}}.quantity.{{$index}}"
                name="order.order.quantity.{{$index}}" type="text" placeholder="" aria-label="Name" disabled>
        </div>
        
        @if(array_key_exists('removeIngredient', $item))

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="name">Removed Ingredients</label>
            
            @foreach ($removeIngredient[$index] as $key => $value)
                {{ $ingredients->firstWhere('id', $value)->name }}<br>
            @endforeach

        </div>

        @endif

        @if(array_key_exists('addExtras', $item))

        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="name">Add</label>
            
            @foreach ($item['addExtras'] as $key => $value)
               {{ $ingredients->firstWhere('id', $value)->name }}<br>
            @endforeach

        </div>

        @endif
        <input-error for="{{$name}}.{{$index}}" class="mt-2" />
    </div>
    <hr>
    @endforeach

</div>
