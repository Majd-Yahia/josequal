<div>
    <form wire:submit="update">
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

</div>
