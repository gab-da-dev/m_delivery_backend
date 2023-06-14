<div class="flex flex-col">
    <x-jet-label for="{{ $name }}" value="{{ __($label) }}" />
    <textarea class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none" id="{{ $name }}" type="text" wire:model.defer="{{ $name }}" rows="4"></textarea>
    <x-jet-input-error for="{{ $name }}" class="mt-2" />
</div>
