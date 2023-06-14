<div class="mt-0 pr-4">
    <label for="{{ $name }}" value="{{ __($label) }}" />
    <select name="{{ $name }}" id="{{ $name }}"
        class="{{ $class ?? ''}} w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
        wire:model="{{ $name }}">
        <option value="">Select {{ $label }}</option>

        @foreach ($collection as $item)
            <option @if( $name .'_id' === $item['id'] ) selected="selected" @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
        @endforeach
    </select>

    <input-error for="{{ $name }}" class="mt-2" />

    @error('{{ $name }}') <span class="error">{{ $message }}</span> @enderror
</div>
