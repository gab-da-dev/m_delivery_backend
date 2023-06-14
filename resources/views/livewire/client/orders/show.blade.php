<div>
    <div class="w-full">
        
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Order #{{$order->id}}
        </p>

        <div class="bg-white overflow-auto">

            @foreach(json_decode($order->order) as $item)
                {{$products[$item->name]}} <br>
                Quantity: {{$item->quantity}} <br>
                {{$item->notes}} <br>
            @endforeach

            Status: {{config('status')[$order->status]['name']}}
        </div>
    </div>
</div>
