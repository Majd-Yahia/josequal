<x-layouts.app>
    <div>
        <div class="overflow-hidden bg-white divide-y divide-gray-200 rounded-lg shadow">
            @include('livewire.web.partials.header')

            <div id="content">
                {{$slot}}
            </div>

            @include('livewire.web.partials.footer')
        </div>

        @include('livewire.web.partials.scrollToTop')
    </div>
</x-layouts.app>
