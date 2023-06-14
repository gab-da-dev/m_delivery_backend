@foreach($products as $key => $item)
    @if ($item->product_type_id == 1)
    <div  class="relative min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer "
        style="height:35vh; width: 100%">
        <div class="rounded-2xl relative">
            <img class="h-40 rounded-2xl w-full object-cover" src="{{ asset($item->image) }}" @click="open = false; product = true; $wire.selectedProduct({{$key}});">
            <p class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group">
                @if (count($item->likes) == 1)
                <svg wire:click="toggleLike({{$item->likes[0]->id}}, 0)" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="red"
                    viewBox="0 0 24 24" stroke="red">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                @else
                <svg wire:click="toggleLike({{$item->id}}, 1)" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                    viewBox="0 0 24 24" stroke="gray">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                @endif
                
            </p>
        </div>
        <div class="mt-4 pl-2 mb-2 flex justify-start" @click="open = false; product = true; $wire.selectedProduct({{$key}});">
            <div>
                <p class="text-md font-semibold text-gray-900 mb-0">{{ $item->name }}</p>
                @if (count($item->promotions) > 0 )
                <p class="text-md text-gray-800 mt-0"> <s>R{{ $item->price }}</s> R{{ $item->promotions->toArray()[0]['promotion_price'] }}</p>
                @else
                <p class="text-md text-gray-800 mt-0">R {{ $item->price }}</p>
                @endif
                @if(json_decode($item['ingredients'] ?? '') != null )
                <p class="text-md text-gray-500 mb-0">
                @foreach(json_decode($item['ingredients'] ?? '') as $item)
                {{$item}},
                @endforeach
                </p>
                @endif
            </div>
            <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                
            </div>
        </div>
        <div class="flex  flex-row">
        
        </div>
    </div>
    @endif
    @endforeach

