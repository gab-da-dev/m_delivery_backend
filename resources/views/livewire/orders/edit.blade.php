<div class="w-full lg:w-full my-6 pr-0 lg:px-12 mt-20">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Update Order
    </p>
    <x-alert-message />

    <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
            <form wire:submit.prevent="" class="p-10 bg-white rounded shadow-xl">

                @include('livewire.orders.dynamic-input-edit', ['array' => $this->order->order, 'label' => 'order',
                'name' =>
                'orderCount', 'products' => $products])

            </form>
        </div>

        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
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

                        @foreach($order->order as $key => $item)

                        <div class="hidden">{{ $price += $item['quantity'] * $item['price'] }}</div>
                        <tr>
                            <td class="border border-green-600">{{ $item['name']  }}</td>
                            <td class="border border-green-600">{{ $item['quantity'] }}</td>
                            <td class="border border-green-600">R {{ $item['quantity'] * $item['price'] }}</td>
                        </tr>

                        @endforeach

                        <tr>
                            <td class="border border-green-600"></td>
                            <td class="border border-green-600">Total</td>
                            <td class="border border-green-600">R {{ $price }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="mt-4" wire:ignore>
                    <label class="block text-sm text-gray-600" for="name">Order Status</label>
                    <div class="mt-0 pr-4">
                        <select name="order.status" id="order.status"
                            class="{{ $class ?? ''}} w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            wire:model.defer="order.status">
                            <option value="">Select order status</option>

                            <option @if( 0 === $order->status ) selected="selected" @endif value="0">pending</option>
                            <option @if( 1 === $order->status ) selected="selected" @endif  value="1">preparing</option>
                            <option @if( 2 === $order->status ) selected="selected" @endif  value="2">complete</option>
                        </select>

                        <input-error for="order.status" class="mt-2" />

                        @error('{{ $name }}') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    
                </div>

                @if ($order->status == '2')
                <div class="mt-4">
                    <label class="block text-sm text-gray-600" for="name">Collect status</label>
                    <div class="mt-0 pr-4">
                        <select name="order.status" id="order.status"
                            class="{{ $class ?? ''}} w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            wire:model="order.collect_status">
                            <option value="">Select collect status</option>

                            <option @if( 0 === $order->collect_status ) selected="selected" @endif value="0">pending</option>
                            <option @if( 1 === $order->collect_status ) selected="selected" @endif  value="1">collected</option>
                            
                        </select>

                        <input-error for="order.status" class="mt-2" />

                        @error('{{ $name }}') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    
                </div>
                @endif


                <div>
                    @if($order['removeIngredient'] != null)
                    @foreach($order['removeIngredient'] as $item)
                    {{$item}},
                    @endforeach
                    @endif
                </div>

                <div class="mt-6">
                    @include('partials.submit-button', ['label' => 'Update'])
                </div>
            </form>
        </div>

    </div>

</div>
