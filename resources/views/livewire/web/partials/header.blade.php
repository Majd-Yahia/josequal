<div x-data="{
    open: false,
    toggle() { this.open = !this.open }
}" class="bg-white ">
    <div class="relative bg-white">
        <div class="px-6 mx-auto max-w-7xl">
            <div
                class="flex items-center justify-between py-6 border-b-2 border-gray-100 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="{{route('web.index')}}" wire:navigate>
                        <span class="sr-only">{{config('app.name')}}</span>
                        <img class="w-auto h-8 sm:h-10" src="{{asset('assets/logo/svg/Group-5.svg')}}" alt="">
                    </a>
                </div>
                <div class="-my-2 -mr-2 md:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                        @click="toggle" @mousedown="if (open) $event.preventDefault()" aria-expanded="false"
                        :aria-expanded="open.toString()">
                        <span class="sr-only">Open menu</span>
                        <svg class="w-6 h-6" x-description="Heroicon name: outline/bars-3"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                        </svg>
                    </button>
                </div>
                <nav class="hidden space-x-10 md:flex">
                    <a href="{{route('web.about-us')}}" wire:navigate
                        class="text-base font-medium text-gray-500 hover:text-gray-900">About Us</a>
                    <a href="{{route('web.services')}}" wire:navigate
                        class="text-base font-medium text-gray-500 hover:text-gray-900">Services</a>
                    <a href="{{route('web.contact-us')}}" wire:navigate
                        class="text-base font-medium text-gray-500 hover:text-gray-900">Contact Us</a>
                </nav>
                <div class="items-center justify-end hidden md:flex md:flex-1 lg:w-0">

                    <a href="{{route('login')}}"
                        class="text-base font-medium text-gray-500 whitespace-nowrap hover:text-gray-900">Sign
                        in</a>

                </div>
            </div>
        </div>
    </div>
    <div x-show="open" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
        x-description="Mobile menu, show/hide based on mobile menu state."
        class="absolute inset-x-0 top-0 p-2 transition origin-top-right transform md:hidden" @click.away="open = false">
        <div class="bg-white divide-y-2 rounded-lg shadow-lg divide-gray-50 ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="w-auto h-8" src="{{asset('assets/logo/svg/Group-5.svg')}}"
                            alt="{{config('app.name')}}">
                    </div>
                    <div class="-mr-2">
                        <button type="button"
                            class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500"
                            @click="toggle">
                            <span class="sr-only">Close menu</span>
                            <svg class="w-6 h-6" x-description="Heroicon name: outline/x-mark"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid gap-y-8">

                        <a href="#" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                            <svg class="flex-shrink-0 w-6 h-6 text-primary-600"
                                x-description="Heroicon name: outline/chart-bar" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z">
                                </path>
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900">Analytics</span>
                        </a>

                        <a href="#" class="flex items-center p-3 -m-3 rounded-md hover:bg-gray-50">
                            <svg class="flex-shrink-0 w-6 h-6 text-primary-600"
                                x-description="Heroicon name: outline/cursor-arrow-rays"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59">
                                </path>
                            </svg>
                            <span class="ml-3 text-base font-medium text-gray-900">Engagement</span>
                        </a>
                        <!-- Add more dropdown menu items as needed -->
                    </nav>
                </div>
            </div>
            <div class="px-5 py-6 space-y-6">
                <div>
                    <a href="#"
                        class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-primary-600 hover:bg-primary-700">Sign
                        up</a>
                    <p class="mt-6 text-base font-medium text-center text-gray-500">
                        Existing customer?
                        <!-- space -->
                        <a href="#" class="text-primary-600 hover:text-primary-500">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
