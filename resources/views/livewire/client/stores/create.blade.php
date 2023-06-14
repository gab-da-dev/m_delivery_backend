<div class="w-full lg:w-1/2 my-6 pr-0 lg:pr-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Create Store
    </p>
    <div class="leading-loose">
        <form  wire:submit.prevent="submit" class="p-10 bg-white rounded shadow-xl" enctype="multipart/form-data" enctype="multipart/form-data">
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Store Name</label>
                <input wire:model="store.name" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
                    placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Street Address</label>
                <input wire:model="store.street_address" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="store.street_address" name="store.street_address" type="text"
                    placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Town</label>
                <input wire:model="store.town" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="store.Town" name="store.Town" type="text"
                    placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Province</label>
                <input wire:model="store.province" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
                    placeholder="" aria-label="Name">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Postal Code</label>
                <input wire:model="store.postal_code" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
                    placeholder="" aria-label="Name">
            </div><div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Open Time</label>
                <input wire:model="store.open_time" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
                    placeholder="" aria-label="Name">
            </div><div class="mt-2">
                <label class="block text-sm text-gray-600" for="name">Close Time</label>
                <input wire:model="store.close_time" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
                    placeholder="" aria-label="Name">
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
