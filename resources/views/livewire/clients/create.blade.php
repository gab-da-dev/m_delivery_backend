<div class="w-full lg:w-full my-6 pr-0 lg:px-12">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Create User
    </p>
    <div class="leading-loose">
        <form wire:submit.prevent="submit" class="p-10 bg-white rounded" enctype="multipart/form-data">
            <div class="mt-2">
                <label class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" for="name">Name</label>
                <input wire:model="user.name" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                    name="name" type="text" placeholder="" aria-label="Name">
            </div>

            <div class="mt-2">
                <label class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" for="name">Email</label>
                <input wire:model="user.email" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                    name="name" type="text" placeholder="" aria-label="Name">
            </div>

            <div class="mt-2">
                <label class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" for="name">User type</label>
                <select  wire:model="user.user_type" name="" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="">
                    @foreach (config('usertypes') as $user)
                        <option value="{{$user['name']}}">{{$user['name']}}</option>
                    @endforeach
                </select>
            </div>

            
            <div class="mt-2">
                <label class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" for="name">admin</label>
               <input type="checkbox" name="" id="" wire:model="user.is_admin" value="1">
            </div>
            

            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                    type="submit">Save</button>
            </div>
        </form>
    </div>
</div>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_oCOkdT40awN1v7yG1SS3rQoZy_I22Sg&libraries=places&callback=initAutocomplete">
</script>
