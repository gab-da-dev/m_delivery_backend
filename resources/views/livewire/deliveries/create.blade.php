<div class="w-full lg:w-full my-6 pr-0 lg:px-12">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Create Order
    </p>
    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2 p-8">
            <form wire:submit.prevent="submit" class="p-10 bg-white rounded shadow-xl">

                @include('livewire.orders.dynamic-input', ['array' => $this->order->order, 'label' => 'order', 'name' =>
                'orderCount'])

                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                        type="submit">Save</button>
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
                        

                        @foreach($order->order + [count($order->order) => ''] as $index => $item)
                        
                     
                        
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
