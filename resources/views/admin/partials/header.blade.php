<div>
    <nav class="bg-gray-800" x-data="{ open: false }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="{{route('home')}}" class="px-2 lg:px-0 font-bold">
                            <span class="text-xl text-white font-semibold uppercase tracking-wide">S1 Blog</span>
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline">
                            @auth
                            <a href="{{route('dashboard')}}"
                                class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Manage
                                Posts
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">

                        @auth
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative" x-data="{ open: false }" @click.away="open = false">
                            <div>
                                <button
                                    class="max-w-xs flex items-center text-sm rounded-full text-white focus:outline-none focus:shadow-solid"
                                    id="user-menu" aria-label="User menu" aria-haspopup="true" @click="open = !open"
                                    x-bind:aria-expanded="open">
                                    <img class="h-8 w-8 rounded-full" src="{{asset('user.svg')}}" alt="" />
                                </button>
                            </div>

                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"
                                style="display: none;">
                                <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                                    aria-labelledby="user-menu">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">{{Auth::user()->name}}
                                    </a>
                                    <a href="{{route('logout')}}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                        role="menuitem">Logout
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white"
                        x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" x-bind:aria-expanded="open"
                        aria-label="Main menu" @click="open = !open">
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"
                            x-state:on="Menu open" x-state:off="Menu closed"
                            :class="{ 'hidden': open, 'block': !open }">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24"
                            x-state:on="Menu open" x-state:off="Menu closed"
                            :class="{ 'hidden': !open, 'block': open }">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!--
      Mobile menu, toggle classes based on menu state.

      Open: "block", closed: "hidden"
    -->
        @auth
        <div class="hidden md:hidden" :class="{'block': open, 'hidden': !open}">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <a href="{{route('dashboard')}}"
                    class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Manage
                    Posts
                </a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{asset('user.svg')}}" alt="" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-none text-white">{{Auth::user()->name}}
                        </div>
                        <div class="mt-1 text-sm font-medium leading-none text-gray-400">{{Auth::user()->email}}
                        </div>
                    </div>
                </div>
                <div class="mt-3 px-2">
                    <a href="#"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">{{Auth::user()->name}}
                    </a>
                    <a href="{{route('logout')}}"
                        class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Logout
                    </a>
                </div>
            </div>
        </div>
        @endauth
    </nav>



</div>
