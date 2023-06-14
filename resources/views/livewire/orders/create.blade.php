<div class="w-full lg:w-full my-6 pr-0 lg:px-12 mt-20">
    
    <p class="text-xl flex items-center">
        <i class="fas fa-list mr-3"></i> Create Order
    </p>
    <x-alert-message />
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <form wire:submit.prevent="submit" class="p-10 bg-white rounded shadow-xl">

                @include('livewire.orders.dynamic-input', ['array' => $this->order->order, 'label' => 'order', 'name' =>
                'order.order'])

                <div class="mt-6">
                @include('partials.submit-button', ['label' => 'Save'])
                </div>
            </form>
        </div>

        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
            <form wire:submit.prevent="submit" class="p-10 bg-white rounded shadow-xl">

                <h1 class="pb-4">Order #{{ $order->id }}</h1>

                <table class="border-collapse border border-green-800 w-full">
                    <thead>
                        <tr>
                            <th class="border border-green-600">Product Name</th>
                            <th class="border border-green-600">Quantity</th>
                            <th class="border border-green-600">Price</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if(count($order->order) > 0)
                        

                        @foreach($ordersArray as $index => $item)
                        
                        
                        
                        @if(!array_key_exists("quantity",$item))
                         {{$item['quantity'] = 1}}
                        @endif

                        @if (array_key_exists("id",$item))
                            <tr>
                            <td class="border border-green-600">{{ $item['name']  }}</td>
                            <td class="border border-green-600">{{ $item['quantity'] }}</td>
                            <td class="border border-green-600">R {{ $item['price'] }}</td>
                        </tr>
                        @endif
                        
                        @endforeach

                        @endif

                        <tr>
                            <td class="border border-green-600"></td>
                            <td class="border border-green-600">Total</td>
                            <td class="border border-green-600">R {{ $price }}</td>
                        </tr>
                    </tbody>
                </table>

            </form>
        </div>

    </div>

</div>
