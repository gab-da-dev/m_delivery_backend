<div class="w-full lg:w-full my-6 pr-0 lg:px-12">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Create Store
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
                <input wire:model="logo" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="logo"
                    name="logo" type="file" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Header Image</label>
                <input wire:model="header_image" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                    id="header_image" name="header_image" type="file" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Address</label>
                @include('livewire.search-map')
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Delivery Cost</label>
                <input wire:model="store.delivery_cost" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                    id="store.street_address" name="store.street_address" type="text" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Delivery Limit</label>
                <input wire:model="store.delivery_limit" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                    id="store.Town" name="store.Town" type="text" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Open Time</label>
                <input wire:model="store.open_time" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                    name="name" type="time" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Close Time</label>
                <input wire:model="store.close_time" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                    id="name" name="name" type="time" placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                @include('partials.toggle', ['label' => 'Active', 'name' => 'store.active'])
            </div>
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                    type="submit">Save</button>
            </div>
        </form>
    </div>
</div>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_oCOkdT40awN1v7yG1SS3rQoZy_I22Sg&libraries=places&callback=initAutocomplete">
</script>
