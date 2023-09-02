<x-layouts.app>
    <div class="min-h-[640px] bg-gray-100">

        <div x-data="{ open: false }" @keydown.window.escape="open = false">

            <div x-show="open" class="relative z-40 md:hidden" x-ref="dialog" aria-modal="true">

                <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>


                <div class="fixed inset-0 z-40 flex">

                    <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transition ease-in-out duration-300 transform"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                        class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-gray-800"
                        @click.away="open = false">

                        <div x-show="open" x-transition:enter="ease-in-out duration-300"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0" class="absolute top-0 right-0 pt-2 -mr-12">
                            <button type="button"
                                class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                @click="open = false">
                                <span class="sr-only">Close sidebar</span>
                                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="flex items-center flex-shrink-0 px-4">
                            <img class="w-auto h-8" src="{{asset('assets/logo/svg/josequal.png')}}"
                                alt="{{config('app.name')}}">
                        </div>
                        <div class="flex-1 h-0 mt-5 overflow-y-auto">
                            <nav class="px-2 space-y-1">
                                @include('livewire.admin.partials.menu')
                            </nav>
                        </div>
                    </div>

                    <div class="flex-shrink-0 w-14" aria-hidden="true">
                        <!-- Dummy element to force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="flex flex-col flex-1 min-h-0 bg-gray-800">
                    <div class="flex items-center flex-shrink-0 h-16 px-4 bg-gray-900">
                        <img class="w-auto h-8" src="{{asset('assets/logo/svg/josequal.png')}}"
                            alt="{{config('app.name')}}">
                    </div>
                    <div class="flex flex-col flex-1 overflow-y-auto">
                        <nav class="flex-1 px-2 py-4 space-y-1">
                            @include('livewire.admin.partials.menu')
                        </nav>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:pl-64">
                <div class="sticky top-0 z-10 flex flex-shrink-0 h-16 bg-white shadow">
                    <button type="button"
                        class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500 md:hidden"
                        @click="open = true">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"></path>
                        </svg>
                    </button>
                    <div class="flex justify-between flex-1 px-4">
                        <div class="flex items-center flex-1">
                            {{-- Header --}}
                            @if (Route::currentRouteName())
                            <h1 class="text-2xl font-semibold text-gray-900">{{
                                Breadcrumbs::render(Route::currentRouteName()) }}</h1>
                            @endif
                            {{-- Header --}}
                        </div>
                        <div class="flex items-center ml-4 md:ml-6">

                            {{-- <buttontype="button"
                                class="p-1 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                                <span class="sr-only">View notifications</span>
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0">
                                    </path>
                                </svg>
                                </buttontype=> --}}

                                <!-- Profile dropdown -->
                                <x-filament::dropdown placement="top-start">
                                    <x-slot name="trigger">
                                        <x-filament::avatar src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}"
                                            size="w-8 h-8" class="rounded-full" />
                                    </x-slot>

                                    <x-filament::dropdown.list>
                                        <x-filament::dropdown.list.item wire:navigate href="{{route('admin.profile')}}"
                                            @class(['bg-gray-100'=>Route::currentRouteName() == "admin.profile" ])
                                            tag="a">

                                            Profile
                                        </x-filament::dropdown.list.item>

                                        <x-filament::dropdown.list.item href="{{route('admin.logout')}}" tag="a">
                                            Sign out
                                        </x-filament::dropdown.list.item>
                                    </x-filament::dropdown.list>
                                </x-filament::dropdown>

                        </div>
                    </div>
                </div>

                <main class="flex-1">
                    <div class="py-6">
                        {{-- Page title --}}
                        {{-- <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                            <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
                        </div> --}}
                        {{-- Page title --}}

                        <div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
                            <!-- Replace with your content -->
                            {{$slot}}

                            @livewire('notifications')

                            <!-- /End replace -->
                        </div>
                    </div>
                </main>
            </div>
        </div>

    </div>
</x-layouts.app>
