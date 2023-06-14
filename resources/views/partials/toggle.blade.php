<style>
    input:checked~.dot {
        transform: translateX(100%);
        background-color: #9eb5f7;
    }

</style>

<div class="flex flex-col mb-4 mr-4">
 <span class="block text-sm text-gray-600"> {{ __($label) }}</span>
    <label for="{{ $name }}" class="flex items-center cursor-pointer">
        <span class="relative">
            <input type="checkbox" id="{{ $name }}" class="sr-only" wire:model="{{ $name }}" checked="checked">
            <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
            <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"></div>
        </span>
    </label>
</div>
