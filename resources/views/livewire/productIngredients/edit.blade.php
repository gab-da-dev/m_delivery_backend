<div class="w-full lg:w-full my-6 pr-0 lg:px-12">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Update Product Ingredient
    </p>
    
    <div class="leading-loose">
        <form wire:submit.prevent="submit" class="p-2 bg-white rounded">
            <div class="mt-2">
                @include('partials.input', ['label' => 'Ingredient', 'name' => 'productIngredient.name'])
            </div>
            
            <div class="mt-2">
                @include('partials.input', ['label' => 'Product Price', 'name' => 'productIngredient.price'])
            </div>

            <div class="mt-2">
                @include('partials.toggle', ['label' => 'Active', 'name' => 'productIngredient.active'])
            </div>
            
            <div class="mt-6">
                @include('partials.submit-button', ['label' => 'Update'])
            </div>
            
        </form>
    </div>
</div>
