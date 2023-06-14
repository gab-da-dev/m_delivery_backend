<label class="block text-sm text-gray-600" for="{{$name}}">{{$label}}</label>
<input wire:model="{{$name}}" class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="" name="{{$label}}" type="text"
    placeholder="" aria-label="Name">
    <x-jet-input-error for="{{ $name }}" class="mt-2" />