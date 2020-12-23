<div class="bg-gray-200 shadow-sm sticky top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-1 md:py-4">
        <div class="flex items-center justify-between md:justify-start">
            <!-- Menu Trigger -->
            <button type="button" class="md:hidden w-10 h-10 rounded-lg -ml-2 flex justify-center items-center">
                <svg class="text-gray-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <!-- ./ Menu Trigger -->
            <div class="flex-shrink-0 flex items-center justify-between ">
                <a href="{{ route('welcome') }}">
                    <x-jet-application-mark class="block h-9 w-auto"/>
                </a>
                <a href="{{ route('welcome') }}" class="font-bold text-gray-700 text-2xl mx-2">
                    Site.My
                </a>
            </div>

            <div class="hidden md:flex space-x-3 flex-1 lg:ml-8">
                <a href="/shop" class="px-2 py-2 hover:bg-gray-100 rounded-lg text-gray-400 hover:text-gray-600"
                   :active="request()->routeIs('shop.index')">Catalog</a>
                <a href="#" class="px-2 py-2 hover:bg-gray-100 rounded-lg text-gray-400 hover:text-gray-600">About
                    Us</a>
                <a href="#" class="px-2 py-2 hover:bg-gray-100 rounded-lg text-gray-400 hover:text-gray-600">Blog</a>
                <a href="#" class="px-2 py-2 hover:bg-gray-100 rounded-lg text-gray-400 hover:text-gray-600">Contact
                    Us</a>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden md:block">
                    <input type="search"
                           class="pl-10 pr-2 h-10 py-1 rounded-lg border border-gray-200 focus:border-gray-300 focus:outline-none focus:shadow-inner leading-none"
                           placeholder="Search">
                    <svg class="h-6 w-6 text-gray-300 ml-2 mt-2 stroke-current absolute top-0 left-0"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>

                <a href="#"
                   class="flex h-10 items-center px-2 rounded-lg border border-gray-200 hover:border-gray-300 focus:outline-none hover:shadow-inner">
                    <svg class="h-6 w-6 leading-none text-gray-300 stroke-current" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span class="pl-1 text-gray-500 text-md">0</span>
                </a>
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
                        <a href="{{ url('/logout') }}">
                            <button type="button"
                                    class="hidden md:block w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                </svg>
                            </button>
                        </a>

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
                                        <path
                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                                    </svg>
                                </button>
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        <!-- Search Mobile -->
        <div class="relative md:hidden">
            <input type="search"
                   class="mt-1 w-full pl-10 pr-2 h-10 py-1 rounded-lg border border-gray-200 focus:border-gray-300 focus:outline-none focus:shadow-inner leading-none"
                   placeholder="Search">

            <svg class="h-6 w-6 text-gray-300 ml-2 mt-3 stroke-current absolute top-0 left-0"
                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </div>
        <!-- ./ Search Mobile -->
    </div>
</div>
