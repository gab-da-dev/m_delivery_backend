<div>

    <div class="px-10 pt-8">
        <p class="text-xl pt-12 pb-6 flex items-center fixed">
            <i class="bi bi-shop-window mr-4"></i> Stores
        </p>
    </div>

    <div class="flex flex-wrap overflow-y-auto pt-4">

        @foreach($stores as $store)

        <div class="relative w-full min-w-[340px] bg-white shadow-md rounded-3xl p-2 mx-1 my-3 cursor-pointer sm:w-96">
            <div class="rounded-2xl relative">
                <img class="h-40 rounded-2xl w-full object-cover"
                    src="https://images.unsplash.com/photo-1595531172949-30922c28a240?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80">
                <p class="absolute right-2 top-2 bg-white rounded-full p-2 cursor-pointer group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:opacity-70" fill="none"
                        viewBox="0 0 24 24" stroke="gray">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </p>
            </div>
            <div class="mt-4 pl-2 mb-2 flex justify-start ">
                <div>
                    <p class="text-md font-semibold text-gray-900 mb-0">{{$store->name}}</p>
                    <p class="text-sm text-gray-800 mt-0"><i class="bi bi-clock"></i> {{$store->open_time}} -
                        {{$store->close_time}}</p>
                </div>
                <div class="flex flex-col-reverse mb-1 mr-4 group cursor-pointer">
                </div>
            </div>
            <div class="flex  flex-row">
                <a href="/stores/{{ $store->id }}"
                    class="px-4 mr-4 ml-auto py-1 text-white font-light tracking-wider bg-gray-900 rounded">Visit
                    store</a>
            </div>
        </div>
        @endforeach

    </div>
    
</div>
