            @props(['active'])
            <div
            @class([
                'pl-1 mt-12 text-sm flex items-center',
                'bg-gray-100 text-gray-700 transition duration-200 ease-in' => $active,
                'hover:bg-gray-100 hover:text-gray-700 transition duration-200 ease-in' => !$active,
                ])
            
            >
                
                <a class="hover:text-black transition duration-200 ease-linear" {{ $attributes }}>{{$slot}}</a>
            </div>

            