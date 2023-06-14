<nav x-data="{ open: true }" class="w-1/4">
    <!-- Primary Navigation Menu -->
    <div class="w-full mx-4 px-0 sm:px-0 lg:px-0">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Hamburger -->
                <div class="ml-6 flex items-center">
                    <button @click="open = ! open; overlay =! overlay"
                        class="bg-white rounded-full inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Logo -->
                {{--<div class="flex-shrink-0 flex items-center">
                    <a href="#" style="width: 333px;">
                        <img class="ml-32 h-20 w-20 rounded-full object-cover"
                            src="{{ asset($logo ?? '') }}" />
                        </svg>

                    </a>
                </div>--}}

            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-auto">

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                            @else
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ Auth::user()->name ?? 'Login' }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-jet-dropdown-link align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown-link>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div @click.outside="open = false; overlay = false;" x-show="open"
        class="h-screen w-64 px-4 border-r bg-white fixed top-0 z-50" x-transition.duration.250ms>
        <div class="h-3/4 flex flex-col text-gray-500">
            <h3>
            <img class="mx-auto h-20 w-40 rounded-full object-cover mt-4"
                            src="{{ asset($logo ?? '') }}" />
            </h3>

                @can('show-dashboard')
                    @include('partials.nav-item', ['name' => 'Dashboarddsada', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path
                            d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>', 'route' => 'admin.dashboard'])
                @endcan
                @can('show-dashboard')
                    <x-nav-item :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">Dashboard</x-nav-item>
                @endcan

                @can('show-deliveries')
                    @include('partials.nav-item', ['name' => 'Deliveries', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                    <path
                        d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>', 'route' => 'admin.deliveries'])
                @endcan
            
                @can('show-orders')
                    @include('partials.nav-item', ['name' => 'Orders', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path
                            d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>', 'route' => 'admin.orders'])
                @endcan
            
                @can('show-products')
                    @include('partials.nav-item', ['name' => 'Products', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path
                            d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>', 'route' => 'admin.products'])
                @endcan

                @can('show-product-types')
                    @include('partials.nav-item', ['name' => 'Product Types', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                            <path
                                d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                        </svg>', 'route' => 'admin.productTypes'])
                @endcan
               
                @can('show-users')
                    @include('partials.nav-item', ['name' => 'Users', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path
                            d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>', 'route' => 'admin.users'])
                @endcan

                @can('show-clients')
                    @include('partials.nav-item', ['name' => 'Clients', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                        <path
                            d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                    </svg>', 'route' => 'admin.clients'])
                @endcan

                @can('show-stores')
                    <h3
                        class="pl-1 mt-12 text-sm flex items-center  hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                        </svg>
                        <a class="hover:text-black transition duration-200 ease-linear" href="/admin/store/1/edit">Store settings</a>
                    </h3>
                @endcan

            @include('partials.nav-item', ['name' => 'Logout', 'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                <path
                    d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
            </svg>', 'route' => 'logout'])




           
            
        </div>
    </div>
</nav>
