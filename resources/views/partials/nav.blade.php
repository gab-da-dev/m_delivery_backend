<nav x-cloak x-data="{ open: false }" class="w-full z-50 fixed">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center">
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

            
        </div>

        <div class="hidden sm:flex sm:items-center sm:ml-auto">

            <!-- Settings Dropdown -->
            <div class="ml-3 relative">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                        @else
                        <span class="inline-flex rounded-md">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                {{ Auth::user()->name ?? 'Login' }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
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
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
    <div @click.outside="open = false; overlay = false;" x-show="open" x-transition:enter=" swing-in-left-fwd" x-transition:leave="swing-out-right-fwd"
        class="h-screen w-64 px-4 border-r bg-white fixed top-0 z-50" 
>
        <div class="h-3/4 flex flex-col text-gray-500">
            <h3>
                <img class="mx-auto h-20 w-40 rounded-full object-cover mt-4" src="{{ asset($logo ?? '') }}" />
            </h3>

            <a class="hover:text-black transition duration-200 ease-linear" href="/home">
                <h3
                    class="pl-1 mt-12 text-sm flex items-center  hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    Home
                </h3>
            </a>
            <a class="hover:text-black transition duration-200 ease-linear" href="/orders">
                <h3
                    class="pl-1 mt-12 text-sm flex items-center  hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                        <path fill-rule="evenodd"
                            d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z"
                            clip-rule="evenodd" />
                    </svg>
                    Orders
                </h3>
            </a>
            <a class="hover:text-black transition duration-200 ease-linear" href="/profile">
                <h3
                    class="pl-1 mt-12 text-sm flex items-center  hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    Profile
                </h3>
            </a>
            <h3
                class="pl-1 mt-12 text-sm flex items-center  hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                    <path fill-rule="evenodd"
                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd" />
                </svg>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="hover:text-black transition duration-200 ease-linear" onclick="event.preventDefault();
                                                this.closest('form').submit();" href="{{ route('logout') }}">Logout</a>

                </form>
            </h3>
        </div>
    </div>
</nav>
