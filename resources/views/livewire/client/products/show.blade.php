<div x-data="{ removeIngredient: false, extras: false, notes: false}">
        <div class="bg-white w-full py-4 overflow-auto w-full flex md:flex-row flex-col">
            <div class="w-1/2 hidden lg:block" id="body" wire:ignore>
                <img id="product_id" style="margin-left: 15%; width: 75%; height: 75%;" alt="">
            </div>
            <div class="w-full lg:w-1/2 px-0">
            <p class="text-gray-600 text-3xl font-medium">
                {{$product['name'] ?? ''}}
            </p>
            @if(json_decode($product['ingredients'] ?? '') != null )
            <p class="text-gray-600 text-sm font-medium mb-2">
            @foreach(json_decode($product['ingredients'] ?? '') as $item)
                {{$item}},
            @endforeach
            </p>
            <p class="text-gray-600 font-light text-2xl">
                
                @if ($promo)
                    <s>R{{ $product['price'] }}</s> R{{ $product->promotions->toArray()[0]['promotion_price'] }}
                @else
                    R{{ $product['price'] ?? ''}}
                @endif
            </p>
            <p><i class="bi bi-clock"></i> <span class="text-gray-600">{{ $product['prep_time'] ?? '' }} min</span></p>
            @endif
        
            @if(json_decode($product['ingredients'] ?? '') != null )
    
                <div>
                    <div class="flex justify-between bg-gray-200 rounded p-2 mb-2 mt-2" @click="removeIngredient = ! removeIngredient;">
                        <label for="quantity" value="quantity" class="text-gray-600 font-medium">
                        Remove Ingredients
                        </label>
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div x-show="removeIngredient">
                        @foreach(json_decode($product['ingredients'] ?? '') as $key => $item)
                            <input class="mr-2" type="checkbox" wire:model.defer="removeIngredient" value="{{$item}}"><span class="text-gray-600">No {{$item}} </span><br>
                        @endforeach
                    </div>
                </div>

                <div x-data="{  }">
                    <div class="flex justify-between bg-gray-200 rounded p-2 mb-2" @click="extras = ! extras;">
                        <label for="quantity" value="quantity" class="text-gray-600 font-medium">
                        Add Extras
                        </label>
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div x-show="extras">
                        @foreach ($products as $extras)
                            @if ($extras->product_type_id == 3)
                            <div class="flex flex-row text-gray-600 font-medium">
                                <div class="w-1/2">
                                    <input class="mr-2" type="checkbox" wire:click="calcExtrasPrice" wire:model.defer="addExtras" value="{{$extras->id}}">{{$extras->name}}
                                </div> 
                                <div class="w-1/2">
                                    R{{$extras->price}}
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div x-data="{}">
                    <div class="flex justify-between bg-gray-200 rounded p-2" @click="notes = ! notes; scrollBy(0, 250)">
                        <label for="quantity" value="quantity" class="text-gray-600 font-medium">
                        Add notes
                        </label>
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>

                    <div x-show="notes">
                        <div class="flex flex-col mt-4">
                            <textarea type="text" wire:model.defer="notes" name="notes" id="" class=" w-full px-5 py-1 text-gray-600 bg-gray-200 rounded">
                            </textarea>
                        </div>
                    </div>
                </div>
            @endif
            
            </div>
        </div>

</div>
