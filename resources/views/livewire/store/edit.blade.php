<div class="w-full lg:w-full my-6 pr-0 lg:px-12">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Edit Store
    </p>
    <div class="leading-loose">
        <form wire:submit.prevent="submit" class="p-10 bg-white rounded shadow-xl" enctype="multipart/form-data">
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Store Name</label>
                <input wire:model="store.name" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                    name="name" type="text" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Logo</label>
                <x-file-pond wire:model="logo" multiple />
                    <img alt="blog photo"
                src="{{ asset($store['logo'] ?? '') }}" width="250"
                class="" />
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Header Image</label>
                <x-file-pond wire:model="header_image" multiple />
                    <img alt="blog photo"
                src="{{ asset($store['header_image'] ?? '') }}" width="250"
                class="" />
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Address</label>
                <label class="block text-xs text-gray-600" for="name">Select the location of your store.</label>
                @livewire('map', ['lng' => $store->lng ?? '', 'lat' => $store->lat ?? ''])
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Delivery Cost</label>
                <label class="block text-xs text-gray-600" for="name">Price added to the total for a delivery</label>
                <input wire:model="store.delivery_cost" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                    id="store.street_address" name="store.street_address" type="text" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Delivery Limit</label>
                <label class="block text-xs text-gray-600" for="name">Dilivery limit in kilometers from the store</label>
                <input wire:model="store.delivery_limit" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                    id="store.Town" name="store.Town" type="text" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Open Time</label>
                <label class="block text-xs text-gray-600" for="name">Set the time store is open for business</label>
                <input wire:model="store.open_time" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                    name="name" type="time" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Close Time</label>
                <label class="block text-xs text-gray-600" for="name">Set the time store is close for business</label>
                <input wire:model="store.close_time" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                    id="name" name="time" type="time" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                @include('partials.toggle', ['label' => 'Online', 'name' => 'store.active'])
            </div>
            <div class="mt-6">
            @include('partials.submit-button', ['label' => 'Update'])
            </div>
        </form>
    </div>
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

</script>