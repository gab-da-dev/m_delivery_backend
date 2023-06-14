<div class="w-full lg:w-full my-6 pr-0 lg:px-12 mt-20">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Edit User
    </p>
    <div class="leading-loose">
        <form wire:submit.prevent="submit" class="p-10 bg-white rounded shadow-xl">
            <div class="mt-2">
                <label class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" for="name">Name</label>
                <input wire:model="user.first_name" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                    name="name" type="text" placeholder="" aria-label="Name">
            </div>

            <div class="mt-2">
                <label class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" for="name">Name</label>
                <input wire:model="user.last_name" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                    name="name" type="text" placeholder="" aria-label="Name">
            </div>

            <div class="mt-2">
                <label class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" for="name">Email</label>
                <input wire:model="user.email" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name"
                    name="name" type="text" placeholder="" aria-label="Name">
            </div>

            <div class="mt-2">
                <label class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" for="name">User type</label>
                <select  wire:model="role" name="" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="">
                    @foreach ($roles as $role)
                        <option value="{{$role['name']}}">{{$role['name']}}</option>
                    @endforeach
                </select>
            </div>

            

            <div class="mt-6">
            @include('partials.submit-button', ['label' => 'Update'])
            </div>
        </form>
    </div>
</div>


<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_oCOkdT40awN1v7yG1SS3rQoZy_I22Sg&libraries=places&callback=initAutocomplete">
</script>
