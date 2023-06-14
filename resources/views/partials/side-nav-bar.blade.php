<div>
    <!-- Primary Navigation Menu -->
    

    <!-- Responsive Navigation Menu -->
    <div @click.outside="open = false; overlay = false;" x-show="open"
        class="h-screen w-64 px-4 border-r bg-white" x-transition.duration.250ms>
        <div class="h-3/4 flex flex-col text-gray-500">
                <h3>
                <img class="mx-auto h-20 w-40 rounded-full object-cover mt-4"
                                src="{{ asset($logo ?? '') }}" />
                </h3>

                
                @can('show-dashboard')
                    <x-nav-item :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">Dashboard</x-nav-item>
                @endcan

                @can('edit-deliveries')
                    @include('partials.nav-item', ['name' => 'Deliveries', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                    <path
                        d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>', 'route' => 'admin.deliveries'])
                @endcan
            
                @can('show-orders')
                <div class="mt-8 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in p-2">
                    <div class="flex justify-between" @click="order =! order">
                        <div class="hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">Orders</div>
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-show="order" x-transition.duration.250ms class="pl-2 ml-2 flex flex-col">
                        <a class="pt-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.orders') }}">Order list</a>
                        <a class="pt-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.orders.create') }}">Create</a>
                    </div>
                </div>
                @endcan
            
                @can(['show-products', 'show-product-types'])
                <div class="mt-8 p-2">
                    <div class="flex justify-between" @click="product =! product">
                        <div class="hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">Products</div>
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-show="product" x-transition.duration.250ms class="pl-2 ml-2 flex flex-col">
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.products') }}">Product list</a>
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.products.create') }}">Create product</a>
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.product-categories') }}">Create category</a>
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.product.ingredients') }}">Product ingredient list</a>
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.product.ingredients.create') }}">Create product ingredients</a>
                    </div>
                </div>
                @endcan
               
                @can(['show-users', 'show-clients'])
                <div class="mt-8 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in p-2">
                    <div class="flex justify-between" @click="user =! user">
                        <div class="hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">Users</div>
                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-show="user" x-transition.duration.250ms class="pl-2 ml-2 flex flex-col">
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.users') }}">User list</a>
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.users.create') }}">Create user</a>
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.clients') }}">Client list</a>
                        <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in" href="{{ route('admin.clients.create') }}">Create user</a>
                    </div>
                </div>
                @endcan

                @can('show-stores')
                    <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in mt-8" href="/admin/store/1/edit">Store settings</a>
                @endcan


            <a class="py-2 hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in mt-8" href="{{ route('logout') }">Logout</a>




           
            
        </div>
    </div>
</div>
