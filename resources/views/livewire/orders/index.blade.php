<div>
<div class="w-full lg:w-full my-6 pr-0 lg:px-12 mt-20">
        
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3 text-gray-700"></i> Orders
        </p>
        
        <a href="{{ route('admin.orders.create') }}" class="px-4 py-2 text-white font-light tracking-wider bg-gray-900 rounded">Create</a>

        <div class="bg-white overflow-auto mt-4">

            <livewire:orders.table />

        </div>
    </div>
</div>
