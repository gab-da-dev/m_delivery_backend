<x-jet-dialog-modal wire:model="{{ $name }}" maxWidth="{{ $widthSize }}">

    <x-slot name="title">

        <div class="flex items-start justify-between border-b border-solid border-gray-200 rounded-t">

            <h1 class="text-grey-200 font-semibold">
                {{ $title }}
            </h1>
            {{ $buttons ?? '' }}
        </div>

    </x-slot>

    <x-slot name="content">

        <div class="flex col-span-12 gap-4 mt-4">

            <form wire:submit.prevent="{{ $formSubmit}}" class="w-full">
                <!--body-->
                <div class="relative flex-auto">

                    {{ $slot }}

                </div>

                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-gray-200 rounded-b">
                <button wire:click="closeModalButton"
                class="text-black-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="button">
                Close
                </button>
                
                </div>
            </form>

        </div>

    </x-slot>

    <x-slot name="footer">

    </x-slot>

</x-jet-dialog-modal>