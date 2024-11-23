<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container py-4">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Update Profile Information</h5>
                            @livewire('profile.update-profile-information-form')
                        </div>
                    </div>
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Update Password</h5>
                            @livewire('profile.update-password-form')
                        </div>
                    </div>
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Two-Factor Authentication</h5>
                            @livewire('profile.two-factor-authentication-form')
                        </div>
                    </div>
                @endif



                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Delete Account</h5>
                            @livewire('profile.delete-user-form')
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
