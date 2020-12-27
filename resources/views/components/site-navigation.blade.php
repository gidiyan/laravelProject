<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto"/>
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">
                        {{ __('Home') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('shop.index') }}" :active="request()->routeIs('shop.index')">
                        {{ __('Catalog') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('About') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}">
                            <button type="button"
                                    class="hidden md:block w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                            </button>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                               this.closest('form').submit();">
                                <button type="button" class="hidden md:block w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                </button>
                            </x-jet-dropdown-link>
                        </form>
                    @else
                        <a href="{{ route('login') }}">
                            <button type="button"
                                    class="hidden md:block w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">
                                <button type="button"
                                        class="hidden md:block w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                                    </svg>
                                </button>
                            </a>
                        @endif
                    @endauth
                @endif
                {{--                <x-jet-dropdown align="right" width="48">--}}
                {{--                    <x-slot name="trigger">--}}
                {{--                            @if (Route::has('login'))--}}
                {{--                                @auth--}}
                {{--                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">--}}
                {{--                                        {{ __('Profile') }}--}}
                {{--                                    </x-jet-dropdown-link>--}}
                {{--                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())--}}
                {{--                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">--}}
                {{--                                            {{ __('API Tokens') }}--}}
                {{--                                        </x-jet-dropdown-link>--}}
                {{--                                    @endif--}}
                {{--                                    <div class="border-t border-gray-100"></div>--}}
                {{--                                    <form method="POST" action="{{ route('logout') }}">--}}
                {{--                                        @csrf--}}
                {{--                                        <x-jet-dropdown-link href="{{ route('logout') }}"--}}
                {{--                                                             onclick="event.preventDefault();--}}
                {{--                                                            this.closest('form').submit();">--}}
                {{--                                            {{ __('Logout') }}--}}
                {{--                                        </x-jet-dropdown-link>--}}
                {{--                                    </form>--}}
                {{--                                @else--}}
                {{--                                    <a href="{{ route('login') }}">--}}
                {{--                                        <button type="button"--}}
                {{--                                                class="hidden md:block w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex justify-center items-center">--}}
                {{--                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"--}}
                {{--                                                 fill="currentColor">--}}
                {{--                                                <path fill-rule="evenodd"--}}
                {{--                                                      d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"--}}
                {{--                                                      clip-rule="evenodd"/>--}}
                {{--                                            </svg>--}}
                {{--                                        </button>--}}
                {{--                                    </a>--}}
                {{--                                    @if (Route::has('register'))--}}
                {{--                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">--}}
                {{--                                            <button type="button"--}}
                {{--                                                    class="hidden md:block w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex justify-center items-center">--}}
                {{--                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"--}}
                {{--                                                     fill="currentColor">--}}
                {{--                                                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>--}}
                {{--                                                </svg>--}}
                {{--                                            </button>--}}
                {{--                                        </a>--}}
                {{--                                    @endif--}}
                {{--                                @endauth--}}
                {{--                            @endif--}}
                {{--                    </x-slot>--}}

                {{--                    <x-slot name="content">--}}
                {{--                        <x-jet-dropdown-link href="{{ route('welcome') }}" :active="request()->routeIs('welcome')">--}}
                {{--                            {{ __('Home') }}--}}
                {{--                        </x-jet-dropdown-link>--}}
                {{--                        <x-jet-dropdown-link href="{{ route('shop.index') }}"--}}
                {{--                                             :active="request()->routeIs('shop.index')">--}}
                {{--                            {{ __('Catalog') }}--}}
                {{--                        </x-jet-dropdown-link>--}}
                {{--                        <x-jet-dropdown-link href="{{ route('about') }}" :active="request()->routeIs('about')">--}}
                {{--                            {{ __('About') }}--}}
                {{--                        </x-jet-dropdown-link>--}}
                {{--                        <!-- Account Management -->--}}
                {{--                        <div class="block px-4 py-2 text-xs text-gray-400">--}}
                {{--                            {{ __('Manage Account') }}--}}
                {{--                        </div>--}}
                {{--                        <x-jet-dropdown-link href="{{ route('profile.show') }}">--}}
                {{--                            {{ __('Profile') }}--}}
                {{--                        </x-jet-dropdown-link>--}}
                {{--                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())--}}
                {{--                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">--}}
                {{--                                {{ __('API Tokens') }}--}}
                {{--                            </x-jet-dropdown-link>--}}
                {{--                        @endif--}}
                {{--                        <div class="border-t border-gray-100"></div>--}}

                {{--                        <!-- Authentication -->--}}
                {{--                        <form method="POST" action="{{ route('logout') }}">--}}
                {{--                            @csrf--}}
                {{--                            <x-jet-dropdown-link href="{{ route('logout') }}"--}}
                {{--                                                 onclick="event.preventDefault();--}}
                {{--                               this.closest('form').submit();">--}}
                {{--                                {{ __('Logout') }}--}}
                {{--                            </x-jet-dropdown-link>--}}
                {{--                        </form>--}}
                {{--                    </x-slot>--}}
                {{--                </x-jet-dropdown>--}}
                <a href="{{ route('checkout.cart') }}"
                   class="flex h-10 items-center px-2 rounded-lg border border-gray-200 hover:border-gray-900 focus:outline-none hover:shadow-inner"
                   x-data="{notempty: {{ $cartCount }}}">
                    <svg class="h-6 w-6 leading-none text-gray-300 stroke-current"
                         x-bind:class="{ 'text-gray-900': notempty !== 0 }" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>

                    <span class="pl-1 text-gray-500 text-md"
                          x-bind:class="{ 'text-indigo-900': notempty !== 0 }">{{ $cartCount }}</span>
                </a>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>



