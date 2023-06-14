<div class="w-full lg:w-full my-6 pr-0 lg:px-12">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Create Product Category
    </p>
    
    <div class="leading-loose">
        <form wire:submit.prevent="submit" class="p-2 bg-white rounded">
        <div class="mt-2">
            @include('partials.input', ['label' => 'Name', 'name' => 'productCategory.name'])
        </div>

        <div class="mt-2">
                @include('partials.toggle', ['label' => 'Active', 'name' => 'productCategory.active'])
            </div>
            
            <div class="mt-6">
                @include('partials.submit-button', ['label' => 'Save'])
            </div>
        </form>
    </div>
</div>
