<div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <img class="w-auto h-12 mx-auto" src="{{asset('assets/logo/svg/Group-5.svg')}}" alt="{{config('app.name')}}">
        <h2 class="mt-6 text-3xl font-bold tracking-tight text-center text-gray-900">Password Reset</h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">

        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">


            <form class="space-y-6" wire:submit="submit">

                {{ $this->form }}

                <div>
                    <x-filament::button
                        class="flex w-full px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 flex-center hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                        type="submit">
                        <x-filament::loading-indicator wire:loading class="w-5 h-5" />
                        <span>Submit</span>
                    </x-filament::button>
                </div>
            </form>

            <x-filament-actions::modals />
            @livewire('notifications')
        </div>
    </div>
</div>
