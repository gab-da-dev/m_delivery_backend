@if($orderObj != null)
@foreach($orderObj as $key => $item)
<div class="flex flex-row mb-4 pb-4">
    <div>
        <button type="button" wire:click="deleteOrderItem('{{$key}}')" class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3"
                viewBox="0 0 16 16">
                <path
                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
            </svg>
        </button>
        <button type="button" wire:click="editOrderItem('{{$key}}')"
            @click="order = false; order_status = false; open = false; product = false; edit = true;" class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
            </svg>
        </button>
    </div>
    <div>
        <p>{{ $item['name'] }}</p>
    </div>
    <div class="flex self-stretch">
        <div class="">

        </div>
    </div>
    <div class="ml-auto">
        <p>R {{ $item['totalPrice'] }}</p>
    </div>
</div>
@endforeach

@if (isset($directionsData))
@if ($directionsData['distance'] < $store[0]->delivery_limit)
    <div class="flex flex-row mb-4 pb-4">
        <div>
            <p>Delivery cost</p>
        </div>
        <div class="flex self-stretch">
            <div class="">

            </div>
        </div>
        <div class="ml-auto">
            <p>R {{ $store[0]->delivery_cost }}</p>
        </div>
    </div>
    @endif
    @endif
    <hr>
    @if ($order_type == 'delivery')
    <div class="flex flex-row mb-4 pb-4">
        <div>
            <p>Total</p>
        </div>
        <div class="flex self-stretch">
            <div class="">

            </div>
        </div>
        <div class="ml-auto">
            <p>R {{ $total_price }}</p>
        </div>
    </div>
    @else
    <div class="flex flex-row mb-4 pb-4">
        <div>
            <p>Total</p>
        </div>
        <div class="flex self-stretch">
            <div class="">

            </div>
        </div>
        <div class="ml-auto">
            <p>R {{ $total_price  }}</p>
        </div>
    </div>
    @endif
    @endif

    <div>
        <button @click="order = false; product = false; open = true; order_type = true;" class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="button">
            Next
        </button>
    </div>

    
