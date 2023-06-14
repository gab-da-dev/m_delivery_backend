<div>
    <div class="w-full mt-12">
        
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Manage your profile
        </p>

        <div class="bg-white overflow-auto">

        <div class="mt-2">

        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif
        </div>
    </div>
</div>