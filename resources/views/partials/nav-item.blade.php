{{--<h3 @if(request()->routeIs('admin.dashboard'))
            class="pl-1 mt-12 text-sm flex items-center  bg-gray-100 text-gray-700 transition duration-200 ease-in"
            @else
            class="pl-1 mt-12 text-sm flex items-center  hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in"
            @endif
                >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-8" viewBox="0 0 20 20" fill="black">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <a class="hover:text-black transition duration-200 ease-linear" href="{{ route('admin.dashboard') }}">Dashboard</a>
            </h3>--}}

            <div @if(request()->routeIs($route))
            class="pl-1 mt-12 text-sm flex items-center  bg-gray-100 text-gray-700 transition duration-200 ease-in"
            @else
            class="pl-1 mt-12 text-sm flex items-center  hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in"
            @endif>
                {!!$icon!!}
                <a class="hover:text-black transition duration-200 ease-linear" href="{{ route($route) }}">{{$name}}</a>
            </div>