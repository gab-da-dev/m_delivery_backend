<div
    x-data="{ open: $wire.order_status ? false : true, order: false, product: false, order_status: $wire.order_status, edit: false, order_type:false  }">

    <x-alert-message />

    <div class="p-4">
        <div class="flex flex-col mb-6" :class="open ? '' : 'hidden'"  x-transition:enter=" swing-in-left-fwd" x-transition:leave="swing-out-right-fwd" style="margin-bottom: 3.5rem;">
            <div class="px-0 pt-8" x-show="open">
                <p class="text-xl pt-12 pb-6 flex items-center">
                    <i class="bi bi-shop-window mr-4"></i> {{$store[0]->name ?? ''}}
                </p>

                <h6 class="pb-6 flex items-center">
                    <i class="bi bi-clock mr-4"></i> {{$store[0]->open_time ?? ''}} - {{$store[0]->close_time ?? ''}}
                </h6>

                <p x-show="product" @click="order = false; product = true; open = true;"
                    class="text-xl pb-6 flex items-center">
                    <i class="fas fa-chevron-left mr-4"></i> Back
                </p>
            </div>

            @if ($current_time->between($start, $end))
                <div class="flex flex-row w-full overflow-x-auto container">
                    @include('livewire.client.stores.products')
                    <!-- Slider controls -->
                    <button x-on:click="scroll()" type="button" class="slideLeft flex absolute top-0 left-0 z-30 justify-center items-center px-4 cursor-pointer group focus:outline-none" data-carousel-prev style="top:50%">
                        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none text-gray-700 bg-gray-300">
                            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                            <span class="hidden">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="slideRight flex absolute top-0 right-0 z-30 justify-center items-center px-4 cursor-pointer group focus:outline-none" data-carousel-next style="top:50%">
                        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none text-gray-700 bg-gray-300">
                            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            <span class="hidden">Next</span>
                        </span>
                    </button>
                </div>
            @elseif (!$store[0]->active)
                {{'Store is currently closed'}}
            @else
                {{'Store is currently closed'}}
            @endif

            
        </div>

        <div :class="product ? '' : 'hidden'" x-transition:enter="swing-in-left-fwd" x-transition:leave="swing-out-right-fwd"
          x-transition:enter=" swing-in-left-fwd" x-transition:leave="swing-out-right-fwd" class="h-screen w-full" style="margin-bottom: 1.5rem;">
            <div class="px-0 pt-1 flex justify-between" x-show="product">
                <button class="text-xl flex items-center rounded-full inline-flex items-center justify-center p-4 text-gray-700 bg-gray-300" @click="order = false; product = false; open = true; $wire.clearSelectedProduct()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </button>
            </div>
            <div wire:loading.delay class="flex flex-row mt-4 mx-auto items-center justify-center" style="margin-left: 41%;">
                <div class="loader"></div>
            </div>
            @include('livewire.client.products.show', ['product' => $product])
        </div>

        <div :class="edit ? '' : 'hidden'"  x-transition:enter=" swing-in-left-fwd" x-transition:leave="swing-out-right-fwd" class=" w-full h-screen" style="margin-bottom: 1.5rem;">
            <div class="px-0 pt-1" x-show="edit">
                <button class="text-xl flex items-center rounded-full inline-flex items-center justify-center p-4 text-gray-700 bg-gray-300"  @click="order = true; product = false; open = false; edit = false;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </button>
            </div>

            @if ($product)
                @include('livewire.client.products.edit', ['product' => $product])
            @endif
            
        </div>

        <div :class="order_status ? '' : 'hidden'"  x-transition:enter=" swing-in-left-fwd" x-transition:leave="swing-out-right-fwd" class="w-full h-screen" style="margin-bottom: 10.5rem;">
            <div class="px-4 pt-1" x-show="order_status">
                
            </div>
            @include('livewire.order')
        </div>

        <div :class="order ? '' : 'hidden'"  x-transition:enter="swing-in-left-fwd" x-transition:leave="swing-out-right-fwd" class="overflow-auto h-screen">
            <div class="px-0 pt-1" x-show="order">
                <button class="text-xl flex items-center rounded-full inline-flex items-center justify-center p-4 text-gray-700 bg-gray-300"  @click="order = false; product = false; open = true;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </button>
            </div>
            <div class="py-10 bg-white rounded" x-data="{ open: false }">
                <p class="text-xl pb-6 flex items-ce nter">
                    Cart
                </p>

                @include('livewire.client.stores.cart')

            </div>
        </div>

        <div :class="order_type ? '' : 'hidden'"  x-transition:enter="swing-in-left-fwd" x-transition:leave="swing-out-right-fwd" class="overflow-auto h-screen" 
        >
            <div class="px-0 pt-1" x-show="order_type">
                <button class="text-xl flex items-center rounded-full inline-flex items-center justify-center p-4 text-gray-700 bg-gray-300"  @click="order = true; product = false; open = false; order_type = false;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                </button>
            </div>
            <div class="py-10 bg-white rounded" x-data="{ open: false }">
                <p class="text-xl pb-6 flex items-ce nter">
                    Order Type
                </p>

                <div class="flex flex-row mb-4 pb-4">
                <div>
                    <p>Order Type</p>
                    <input class="mr-2" type="radio" x-on:click="open = false" wire:model="order_type" value="collect">
                        <span
                            class="text-gray-600">Collect 
                        </span>
                    </input><br>
                    <input class="mr-2" type="radio" x-on:click="open = true; scrollBy(0, 1000)" wire:model="order_type" value="delivery">
                    <span
                        class="text-gray-600">Deliver 
                    </span>
                    </input><br>
                </div>
            </div>


    <div class="w-full">
        @if ($order_type == 'delivery')
            @livewire('map-directions', ['position' => $position])
        @endif


        @if (isset($directionsData))
        @if (($directionsData['distance'] / 1000)  > $store[0]->delivery_limit)
        <span>Your location is outside our store radius for deliveries. Please change your order to
            collect.</span>
        @endif
        @endif
    </div>

    <div class="w-full mb-4">
        @if (isset($directionsData)) 
        @if (($directionsData['distance'] / 1000) < $store[0]->delivery_limit)
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="button"
                @click="$wire.submit(); order = false; order_status = true; open = true; scrollBy(0, -250)">
                Send Order</button>
            @endif
            @endif
    </div>

    <div class="w-full">
        @if ($order_type === 'collect')
        <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="button"
            @click="$wire.submit(); order = false; order_status = true; open = true; scrollBy(0, -250)">
            Send Order</button>
        @endif
    </div>

            </div>
        </div>
    </div>

    @include('partials.bottom-bar')

</div>

@if ($order_status)
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var orderChannel = pusher.subscribe(`orderUpdated_{{$order->id}}`);
            orderChannel.bind('order-updated', function (data) {
                window.livewire.emit('orderUpdated', data.order.status);
                    
                });

            @if ($order->order_type == 'delivery') //alert('test delivery');
                var deliveryChannel = pusher.subscribe(`driverLocationUpdated_{{$order->id}}`);
                deliveryChannel.bind('driverLocation', function (data) {
                    window.livewire.emit('orderUpdated');
                });
            @endif
        })
    </script>
@endif

<script>
    window.addEventListener('name-updated', event => {
        document.querySelector('#body').style.backgroundImage = `url(${event.detail.newName})`;
        document.getElementById("product_id").src= `${event.detail.newName}`;
    })


</script>



<script>
    var x = document.getElementById("demo");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
        // console.log('position');
        // console.log(position['coords']['latitude']);
        // livewire.emit('setPosition', position['coords']['latitude'], position['coords']['longitude']);
        livewire.emit('setPosition', -25.7478676, 28.2292712);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "User denied the request for Geolocation."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Location information is unavailable."
                break;
            case error.TIMEOUT:
                x.innerHTML = "The request to get user location timed out."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "An unknown error occurred."
                break;
        }
    }

    const rightButtons = Array.from(document.getElementsByClassName('slideRight'));
    const leftButtons = Array.from(document.getElementsByClassName('slideLeft'));
    const containers = Array.from(document.getElementsByClassName('container'));

let index = 0;
for (const rightButton of rightButtons) {
    const container = containers[index];
    rightButton.addEventListener("click", function () {
        container.scrollLeft += 340;
    });
    index++;
}

index = 0;
for (const leftButton of leftButtons) {
    const container = containers[index];
    leftButton.addEventListener("click", function () {
        container.scrollLeft -= 340;
    });
    index++;
}

</script>
