<div class="w-full lg:w-full my-6 pr-0 lg:px-12">

    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Update Product
    </p>
    
    <div class="leading-loose">
        <form wire:submit.prevent="submit" class="p-2 bg-white rounded" enctype="multipart/form-data"
            enctype="multipart/form-data">

            <div class="mt-4">
                    <label class="block text-sm text-gray-600" for="name">Product category</label>
                    <div class="mt-0">
                        <select name="product.product_category_id" id="product.product_category_id"
                            class="{{ $class ?? ''}} w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                            wire:model="product.product_category_id">
                            <option value="">Select product {{$product->product_category_id}}</option>
                            @foreach ($productCategories as $productCategory)
                            <option @if ($productCategory->id == $product->product_category_id)
                                
                            @endif value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                            @endforeach
                            
                        </select>

                        <input-error for="product.product_category_id" class="mt-2" />
                    </div> 
            </div>

            <div class="mt-2">
                @include('partials.input', ['label' => 'Product Name', 'name' => 'product.name'])
            </div>

            <div class="mt-2">
            @include('partials.textarea', ['label' => 'Description',
                'name'=>'product.description'])
            </div>

            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Image</label>
                <x-file-pond wire:model="filename" />
                <br>
               @if ($filename)
                        <img src="{{ $filename->temporaryUrl() }}" width="250">
                    @endif
                @if(!$filename)
                    <img src="{{ asset($product->image) }}">  
                @endif
            </div>
            <div class="mt-2" x-data="{ingredients: false}">
                <div class="flex flex-row">
                    <label class="block text-sm text-gray-600 mr-2" for="name">Ingredients</label> <input type="checkbox" name="" id="" @click="ingredients =! ingredients">
                </div>

                <div x-show="ingredients">
                    @foreach ($productIngredients as $productIngredient)
                        <input type="checkbox" wire:model.defer="product.ingredients" value="{{$productIngredient->id}}" class="mr-2">{{$productIngredient->name}} <br>
                    @endforeach
                </div>

            </div>

            {{--<div class="mt-2">
                @include('partials.pricing-dynamic-input', ['array' => $product->size_pricing, 'label' => 'Size Pricing', 'name'
                => 'product.size_pricing'])
            </div>--}}

            <div class="mt-2">
                @include('partials.input', ['label' => 'Product Price', 'name' => 'product.price'])
            </div>

            <div class="mt-2">
                @include('partials.input', ['label' => 'Preparation Time', 'name' => 'product.prep_time'])
            </div>

            <div class="mt-2">
                @include('partials.toggle', ['label' => 'Active', 'name' => 'product.active'])
            </div>

            <div class="mt-6">
                @include('partials.submit-button', ['label' => 'Save']) 
            </div>
        </form>
    </div>

    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
</div>


