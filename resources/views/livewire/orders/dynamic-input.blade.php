<label for="{{ $name }}" value="{{ __($label) }}" />

<div class="flex flex-col">
    @foreach($array + [count($array) => ''] as $index => $item)
    <div class="flex flex-col mt-4" wire:key="order-{{ $index }}">
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
        <div class="mt-2">
            @include('partials.dropdown', ['label' => 'Product', 'name' => 'order.order.'.$index.'.id', 'collection' => $products])
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="name">Quantity</label>
            
                <select name="order.order.{{$index}}.quantity" 
                    class="w-full px-5 py-1 mt-4 text-gray-600 bg-gray-200 rounded"
                    wire:model="order.order.{{$index}}.quantity">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="name">Notes</label>
            <textarea wire:model="order.order.{{$index}}.notes" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="order.order.{{$index}}.notes.{{$index}}"
                 type="text" placeholder="" aria-label="Name"></textarea>
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="name">Removed Ingredients</label>
            @if(json_decode($product['ingredients'] ?? '') != null )
                @foreach(json_decode($product['ingredients'] ?? '') as $key => $item)
                    <input class="mr-2" type="checkbox" wire:model="removeIngredient" value="{{$item}}"><span class="text-gray-600">No {{$item}} </span><br>
                @endforeach
            @endif
        </div>
        <input-error for="{{$name}}.{{$index}}" class="mt-2" />
    </div>
    <hr>
    @endforeach

</div>
