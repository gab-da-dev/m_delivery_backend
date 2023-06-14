<div class="w-full lg:w-full my-6 pr-0 lg:px-12 mt-20">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list"></i> Update Delivery
    </p>
    
        <div class="lg:w-full lg:pr-2">
            <form wire:submit.prevent="submit" class="p-10 bg-white rounded shadow-xl">

                <h1 class="pb-4">Delivery #{{ $order->id }}</h1>

                <div class="mt-4">
                    <div class="mt-2">
                        <p>client name: {{$user->name}}</p>
                            @foreach ($order->order as $item)
                                <p>{{$item['name']}}</p>
                                <p class="hidden">{{$price = $price + $item['price']}}</p>
                            @endforeach

                            <p>Delivery price: R{{$store->delivery_cost}}</p>
                            <p>total price: R{{$price}}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="mt-2">
                        <label
                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            for="name">Delivery Status</label>
                        <select wire:model="order.status" name=""
                            class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="">
                            <option value="">Select Update</option>
                            <option value="3">On they way</option>
                            <option value="4">Delivered</option>
                        </select>
                    </div>
                </div>

                <div>
                    @if($order['removeIngredient'] != null)
                    @foreach($order['removeIngredient'] as $item)
                    {{$item}},
                    @endforeach
                    @endif
                </div>

                <div id="demo"></div>

                <div class="mt-4">
                    <a  class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" target="_blank" href="https://www.google.com/maps/search/?api=1&query={{$order->latitude}}%2C{{$order->longitude}}">
                        Open Delivery Location
                    </a>
                </div>

                <div class="mt-6">
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="button" onclick="getLocation()">Send Position</button>
                </div>

                <div class="mt-6">
                    @include('partials.submit-button', ['label' => 'Update'])
                </div>
            </form>
        </div>


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
                console.log(position['coords']['latitude'], position['coords']['longitude']);
                // console.log(position['coords']['latitude']);
                // livewire.emit('setPosition', position['coords']['latitude'], position['coords']['longitude']);
                // livewire.emit('setPosition', position.coords.latitude, position.coords.longitude);
                window.livewire.emit('setPosition', position['coords']['latitude'], position['coords']['longitude']);
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


            window.addEventListener('driverUpdate', event => {
                
            

            })

        </script>
</div>
