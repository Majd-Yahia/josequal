<div>
    <div class="bg-white">
        <div>
            <!--
            Mobile filter dialog

            Off-canvas menu for mobile, show/hide based on off-canvas menu state.
          -->
            <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
                <!--
              Off-canvas menu backdrop, show/hide based on off-canvas menu state.

              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
                <div class="fixed inset-0 bg-black bg-opacity-25"></div>

                <div class="fixed inset-0 z-40 flex">
                    <!--
                Off-canvas menu, show/hide based on off-canvas menu state.

                Entering: "transition ease-in-out duration-300 transform"
                  From: "translate-x-full"
                  To: "translate-x-0"
                Leaving: "transition ease-in-out duration-300 transform"
                  From: "translate-x-0"
                  To: "translate-x-full"
              -->
                    <div
                        class="relative flex flex-col w-full h-full max-w-xs py-4 pb-6 ml-auto overflow-y-auto bg-white shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                            <button type="button"
                                class="flex items-center justify-center w-10 h-10 p-2 -mr-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Close menu</span>
                                <!-- Heroicon name: outline/x-mark -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Filters -->
                        <form class="mt-4">
                            <div class="pt-4 pb-4 border-t border-gray-200">
                                <fieldset>
                                    <legend class="w-full px-2">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-2 text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-0" aria-expanded="false">
                                            <span class="text-sm font-medium text-gray-900">Color</span>
                                            <span class="flex items-center ml-6 h-7">
                                                <!--
                              Expand/collapse icon, toggle classes based on section open state.

                              Heroicon name: mini/chevron-down

                              Open: "-rotate-180", Closed: "rotate-0"
                            -->
                                                <svg class="w-5 h-5 transform rotate-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </legend>
                                    <div class="px-4 pt-4 pb-2" id="filter-section-0">
                                        <div class="space-y-6">
                                            <div class="flex items-center">
                                                <input id="color-0-mobile" name="color[]" value="white" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="color-0-mobile"
                                                    class="ml-3 text-sm text-gray-500">White</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="color-1-mobile" name="color[]" value="beige" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="color-1-mobile"
                                                    class="ml-3 text-sm text-gray-500">Beige</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="color-2-mobile" name="color[]" value="blue" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="color-2-mobile"
                                                    class="ml-3 text-sm text-gray-500">Blue</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="color-3-mobile" name="color[]" value="brown" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="color-3-mobile"
                                                    class="ml-3 text-sm text-gray-500">Brown</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="color-4-mobile" name="color[]" value="green" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="color-4-mobile"
                                                    class="ml-3 text-sm text-gray-500">Green</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="color-5-mobile" name="color[]" value="purple" type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="color-5-mobile"
                                                    class="ml-3 text-sm text-gray-500">Purple</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="pt-4 pb-4 border-t border-gray-200">
                                <fieldset>
                                    <legend class="w-full px-2">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-2 text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-1" aria-expanded="false">
                                            <span class="text-sm font-medium text-gray-900">Category</span>
                                            <span class="flex items-center ml-6 h-7">
                                                <!--
                              Expand/collapse icon, toggle classes based on section open state.

                              Heroicon name: mini/chevron-down

                              Open: "-rotate-180", Closed: "rotate-0"
                            -->
                                                <svg class="w-5 h-5 transform rotate-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </legend>
                                    <div class="px-4 pt-4 pb-2" id="filter-section-1">
                                        <div class="space-y-6">
                                            <div class="flex items-center">
                                                <input id="category-1-mobile" name="category[]" value="tees"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="category-1-mobile"
                                                    class="ml-3 text-sm text-gray-500">Bathroom</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="category-2-mobile" name="category[]" value="crewnecks"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="category-2-mobile"
                                                    class="ml-3 text-sm text-gray-500">Kitchen</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="category-3-mobile" name="category[]" value="sweatshirts"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="category-3-mobile"
                                                    class="ml-3 text-sm text-gray-500">Medical Care</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="category-4-mobile" name="category[]" value="pants-shorts"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="category-4-mobile"
                                                    class="ml-3 text-sm text-gray-500">Pants
                                                    &amp; Shorts</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="pt-4 pb-4 border-t border-gray-200">
                                <fieldset>
                                    <legend class="w-full px-2">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-2 text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-2" aria-expanded="false">
                                            <span class="text-sm font-medium text-gray-900">Sizes</span>
                                            <span class="flex items-center ml-6 h-7">
                                                <!--
                              Expand/collapse icon, toggle classes based on section open state.

                              Heroicon name: mini/chevron-down

                              Open: "-rotate-180", Closed: "rotate-0"
                            -->
                                                <svg class="w-5 h-5 transform rotate-0"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </legend>
                                    <div class="px-4 pt-4 pb-2" id="filter-section-2">
                                        <div class="space-y-6">
                                            <div class="flex items-center">
                                                <input id="sizes-0-mobile" name="sizes[]" value="xs"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="sizes-0-mobile"
                                                    class="ml-3 text-sm text-gray-500">XS</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="sizes-1-mobile" name="sizes[]" value="s"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="sizes-1-mobile"
                                                    class="ml-3 text-sm text-gray-500">S</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="sizes-2-mobile" name="sizes[]" value="m"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="sizes-2-mobile"
                                                    class="ml-3 text-sm text-gray-500">M</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="sizes-3-mobile" name="sizes[]" value="l"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="sizes-3-mobile"
                                                    class="ml-3 text-sm text-gray-500">L</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="sizes-4-mobile" name="sizes[]" value="xl"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="sizes-4-mobile"
                                                    class="ml-3 text-sm text-gray-500">XL</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="sizes-5-mobile" name="sizes[]" value="2xl"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="sizes-5-mobile"
                                                    class="ml-3 text-sm text-gray-500">2XL</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <main class="max-w-2xl px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="pb-10 border-b border-gray-200">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900">Our Services</h1>
                    <p class="mt-4 text-base text-gray-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                        Ipsam laudantium soluta quibusdam fugit dolorum totam velit delectus in iure? Maxime enim vel ex
                        impedit accusantium quaerat voluptates aspernatur minima iure.</p>
                </div>

                <div class="pt-12 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
                    <aside>
                        <h2 class="sr-only">Filters</h2>

                        <!-- Mobile filter dialog toggle, controls the 'mobileFilterDialogOpen' state. -->
                        <button type="button" class="inline-flex items-center lg:hidden">
                            <span class="text-sm font-medium text-gray-700">Filters</span>
                            <!-- Heroicon name: mini/plus -->
                            <svg class="flex-shrink-0 w-5 h-5 ml-1 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                            </svg>
                        </button>

                        <div class="hidden lg:block">
                            <form class="space-y-10 divide-y divide-gray-200">
                                <div class="pt-10">
                                    <fieldset>
                                        <legend class="block text-sm font-medium text-gray-900">Category</legend>
                                        <div class="pt-6 space-y-3">

                                            <div class="flex items-center">
                                                <input id="category-1" name="category[]" value="tees"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="category-1"
                                                    class="ml-3 text-sm text-gray-600">Bathroom</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="category-2" name="category[]" value="crewnecks"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="category-2"
                                                    class="ml-3 text-sm text-gray-600">Kitchen</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="category-3" name="category[]" value="sweatshirts"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="category-3"
                                                    class="ml-3 text-sm text-gray-600">Windows</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input id="category-4" name="category[]" value="pants-shorts"
                                                    type="checkbox"
                                                    class="w-4 h-4 border-gray-300 rounded text-primary-600 focus:ring-primary-500">
                                                <label for="category-4"
                                                    class="ml-3 text-sm text-gray-600">Roofs</label>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                        </div>
                    </aside>

                    @if (isset($services) && $services->count() > 0)
                        <!-- Product grid -->
                        <div class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
                            <!-- Replace with your content -->
                            <div class="border-4 border-gray-200 border-dashed rounded-lg h-96 lg:h-full">
                                <div class="flex flex-wrap -mx-4">
                                    @foreach ($services as $service)
                                        @include('livewire.web.components.service-details')
                                    @endforeach
                                </div>
                            </div>
                            <!-- /End replace -->
                        </div>
                    @else
                        <!-- Product grid -->
                        <div class="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
                            <!-- Replace with your content -->
                            <div class="border-4 border-gray-200 border-dashed rounded-lg h-96 lg:h-full">
                                <div class="text-center">
                                    <h1> No Services</h1>
                                </div>
                            </div>
                            <!-- /End replace -->
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</div>
